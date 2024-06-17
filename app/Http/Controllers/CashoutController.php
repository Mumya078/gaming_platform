<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Cashout;
use App\Models\withdraw;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashoutController extends Controller
{
    //
    public function cashout(){
        $cashout = Cashout::all();
        return view("page.front.cashout",[
            'cashouts'=>$cashout,
        ]);
    }


    public function withdraw(Request $request){
        // Gelen 'values' alanını decode etmeye çalışalım
        $values = json_decode($request->input('values'), true);

        // Eğer $values null ise, JSON doğru bir şekilde parse edilmemiş demektir.
        if (is_null($values)) {
            // Hata mesajı dönebiliriz veya başka bir işlem yapabiliriz
            return redirect()->back()->with('error', 'Invalid values input.');
        }

        // JSON verilerinin beklenen formatta olup olmadığını kontrol edelim
        if (!isset($values['mainValue']) || !isset($values['extraValue'])) {
            return redirect()->back()->with('error', 'Missing required values.');
        }

        $mainValue = $values['mainValue'];
        $extraValue = $values['extraValue'];

        // Kullanıcının diamond miktarını kontrol et
        if (Auth::user()->diamond >= $mainValue) {
            $withdraw = new Withdraw();
            $withdraw->user_name = $request->user()->name;
            $withdraw->iban = $request->input('iban'); // Doğrudan request'ten alıyoruz
            $withdraw->user_id = $request->user()->id;
            $withdraw->deposit_diamond = $mainValue;
            $withdraw->cashout_try = $extraValue;
            $withdraw->save();

            // Kullanıcının diamond miktarını güncelle
            $user = Auth::user();
            $user->diamond -= $mainValue;
            $user->save();
            return redirect('/cashout')->with('success', 'Withdrawal request processed successfully.');
        } else {
            // Yeterli diamond yoksa hata mesajı ile geri dön
            return redirect()->back()->withErrors(['error' => 'Insufficient diamonds for this transaction.']);
        }
    }

    public function cashout_setting(){
        $cashout = Cashout::all();
        return view('page.back.cashout.settings',[
            'cashouts' => $cashout
        ]);
    }
    public function upload_choice(Request $request){
        $cashout = new Cashout();
        $cashout->diamond = $request->diamond;
        $cashout->TRY = $request->TRY;
        $cashout->save();

        return redirect('/admin/cashout/setting');
    }

    public function delete($id){
        $cashout = Cashout::find($id);
        $cashout->delete();

        return redirect('/admin/cashout/setting');
    }

    public function waiting(){
        $cashouts = withdraw::where('status',OrderStatus::WAITING)->get();

        return view("page.back.cashout.waiting",[
            'cashout' => $cashouts
        ]);
    }

    public function accept_cashout($id){
        $withdraw = withdraw::find($id);
        $withdraw->status = OrderStatus::APPROVED;
        $withdraw->save();

        return redirect('/admin/cashout/waiting');
    }

    public function reject_cashout($id){
        $withdraw = withdraw::find($id);
        $user = \App\Models\User::find($withdraw->user_id);
        $user->diamond += $withdraw->deposit_diamond ;
        $user->save();
        $withdraw->status = OrderStatus::REJECTED;
        $withdraw->save();

        return redirect('/admin/cashout/waiting');
    }

    public function accepted(){
        $withdraw = withdraw::where('status',OrderStatus::APPROVED)->get();
        return view("page.back.cashout.accepted",[
            'withdraw' => $withdraw
        ]);
    }

    public function delete_accepted_withdraw($id){
        $withdraw = withdraw::find($id);
        $withdraw->delete();

        return redirect('/admin/cashout/accepted');
    }

    public function rejected(){
        $withdraw = withdraw::where('status',OrderStatus::REJECTED)->get();

        return view("page.back.cashout.rejected",[
            'withdraw' =>$withdraw
        ]);
    }
}
