<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Inscricao;
use App\Experiencia;
use App\Qualificacao;
use App\Publicacao;
use PDF;
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdfConfirmarInscricao($idPublicacao){
        $publicacao = Publicacao::find($idPublicacao);
        $user = Auth()->user();
        $inscricao = $publicacao->inscricoes()->where('id','=',$user->inscricao_id)->first();
        $cargo = $publicacao->cargos()->where('id','=',$inscricao->pivot->cargo_id)->first();
        
        $pdf=PDF::loadView('inscricao.confirmarInscricaoPDF',['inscricao'=>$inscricao, 'publicacao'=>$publicacao, 'cargo'=>$cargo]);
        return $pdf->stream('Inscrição.pdf');

    }

    public function pdfcurriculoRelatorio($id){
        $inscricao = Inscricao::find($id);
        $experiencias = Experiencia::where('inscricao_id', $id)->get();
        $qualificacoes = Qualificacao::where('inscricao_id', $id)->get();
        $pdf=PDF::loadView('dashboard.publicacao.relatorios.PDFcurriculo',['inscricao'=>$inscricao,'experiencias'=>$experiencias, 'qualificacoes'=>$qualificacoes]);
        return $pdf->stream('Curriculo.pdf');

    }

    public function pdflistadeInscritos($id){
        $publicacao = Publicacao::find($id);
        $inscricoes = $publicacao->inscricoes;
        $pdf=PDF::loadView('dashboard.publicacao.relatorios.PDFlistadeinscritos',['publicacao'=>$publicacao],['inscricoes'=>$inscricoes]);
        return $pdf->stream('ListadeInscritos.pdf');
    }

    public function pdflistadeDeferimentos($id){
        $publicacao = Publicacao::find($id);
        $inscricoes = $publicacao->inscricoes;
        $pdf=PDF::loadView('dashboard.publicacao.relatorios.PDFlistadedeferimentos',['publicacao'=>$publicacao],['inscricoes'=>$inscricoes]);
        return $pdf->stream('ListadeDeferimentos.pdf');
    }

    public function pdflistadeClassificados($id){
        $publicacao = Publicacao::find($id);
        $inscricoes = $publicacao->inscricoes;
        $pdf=PDF::loadView('dashboard.publicacao.relatorios.PDFlistadeclassificados',['publicacao'=>$publicacao],['inscricoes'=>$inscricoes]);
        return $pdf->stream('ListadeClassificados.pdf');
    }

    public function pdflistadePontuacao($id){
        $publicacao = Publicacao::find($id);
        $inscricoes = $publicacao->inscricoes;
        $pdf=PDF::loadView('dashboard.publicacao.relatorios.PDFlistadepontuacao',['publicacao'=>$publicacao],['inscricoes'=>$inscricoes]);
        return $pdf->stream('ListadePontuação.pdf');
    }

    public function pdflistadeConvocacao($id){
        $publicacao = Publicacao::find($id);
        $inscricoes = $publicacao->inscricoes;
        $pdf=PDF::loadView('dashboard.publicacao.relatorios.PDFlistadeconvocacao',['publicacao'=>$publicacao],['inscricoes'=>$inscricoes]);
        return $pdf->stream('ListadeConvocação.pdf');
    }
}
