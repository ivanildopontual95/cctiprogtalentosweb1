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

    public function pdfConfirmarInscricao($id){
        $inscricao = Inscricao::find($id);
        $qualificacoes = Qualificacao::find($id);
        $publicacao = Publicacao::find($id);
        $pdf=PDF::loadView('inscricao.confirmarIncricaoPDF',['inscricao'=>$inscricao],['qualificacoes'=>$qualificacoes],['publicacao'=>$publicacao]);
        return $pdf->stream('Inscrição.pdf');

    }

    public function pdfcurriculoRelatorio($id){
        $inscricao = Inscricao::find($id);
        $experiencia = Experiencia::find($id);
        $pdf=PDF::loadView('dashboard.publicacao.relatorios.PDFcurriculo',['inscricao'=>$inscricao],['experiencia'=>$experiencia]);
        return $pdf->stream('Curriculo.pdf');

    }

    public function pdflistadeInscritos($id){
        $inscricao = Inscricao::find($id);
        $experiencia = Experiencia::find($id);
        $pdf=PDF::loadView('dashboard.publicacao.relatorios.PDFlistadeinscritos',['inscricao'=>$inscricao],['experiencia'=>$experiencia]);
        return $pdf->stream('Curriculo.pdf');
    }

    public function pdflistadeDeferimentos($id){
        $inscricao = Inscricao::find($id);
        $experiencia = Experiencia::find($id);
        $pdf=PDF::loadView('dashboard.publicacao.relatorios.PDFlistadedeferimentos',['inscricao'=>$inscricao],['experiencia'=>$experiencia]);
        return $pdf->stream('Curriculo.pdf');
    }

    public function pdflistadeClassificados($id){
        $inscricao = Inscricao::find($id);
        $experiencia = Experiencia::find($id);
        $pdf=PDF::loadView('dashboard.publicacao.relatorios.PDFlistadeclassificados',['inscricao'=>$inscricao],['experiencia'=>$experiencia]);
        return $pdf->stream('Curriculo.pdf');
    }

    public function pdflistadeConvocacao($id){
        $inscricao = Inscricao::find($id);
        $experiencia = Experiencia::find($id);
        $pdf=PDF::loadView('dashboard.publicacao.relatorios.PDFlistadeconvocacao',['inscricao'=>$inscricao],['experiencia'=>$experiencia]);
        return $pdf->stream('Curriculo.pdf');
    }
}
