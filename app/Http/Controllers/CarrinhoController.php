<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    // Mostra os itens do carrinho
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Produto $produto)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$produto->id])) {
            $cart[$produto->id]['quantidade']++;
        } else {
            $cart[$produto->id] = [
                "nome" => $produto->nome,
                "quantidade" => 1,
                "preco" => $produto->preco,
                "imagem" => $produto->imagem
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    public function update(Request $request, Produto $produto)
    {
        $cart = session()->get('cart');

        if (isset($cart[$produto->id])) {
            $cart[$produto->id]['quantidade'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Carrinho atualizado!');
        }
        
        return redirect()->route('cart.index')->with('success', 'Carrinho atualizado!');
    }

    public function remove(Produto $produto)
    {
        $cart = session()->get('cart');

        if (isset($cart[$produto->id])) {
            unset($cart[$produto->id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produto removido do carrinho!');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Carrinho limpo com sucesso!');
    }
}
