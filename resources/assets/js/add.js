$(document).ready(function() {

    //add campos qualificacoes
    var campos_max          = 20;   //max de 10 campos
    var x = 1; // campos iniciais
    var button = $('#add_field_qualificacoes');

        if (button.attr('data-contador') > 0) {
                x += parseInt(button.attr('data-contador'));
        }
        button.click (function(e) {
            e.preventDefault();     //prevenir novos clicks
            if (x < campos_max) {
                    
                    $('#listas_qualificacoes').append('<div class="col s12">\
                        <div class="row"></div>\
                        <div class="input-field col s6">\
                           <input type="text" name="qualificacoes['+x+'][instituicao]">\
                           <label>Instituição </label>\
                        </div>\
                        <div class="input-field col s6">\
                           <input type="text" name="qualificacoes['+x+'][curso]">\
                           <label>Curso</label>\
                        </div>\
                        <div class="input-field col s12">\
                            <p>Período</p>\
                        </div>\
                        <div class="input-field col s3">\
                           <input type="text" class="datepicker" name="qualificacoes['+x+'][dataInI]">\
                           <label>Data de inicio</label>\
                        </div>\
                        <div class="input-field col s3">\
                           <input type="text" class="datepicker" name="qualificacoes['+x+'][dataTermI]">\
                           <label>Data de fim</label>\
                        </div>\
                        <div class="input-field col s6">\
                           <input type="text" name="qualificacoes['+x+'][cargaHora]">\
                           <label>Carga horária</label>\
                        </div>\
                                <a href="#" class="remover_campo">Remover</a>\
                        </div>');
                    x++;
            }
    });
    // Remover o div anterior
    $('#listas_qualificacoes').on("click",".remover_campo",function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
    });


    //add campos experiencias
    var campos_max          = 20;   //max de 10 campos
    var z = 1; // campos iniciais
    var button = $('#add_field_experiencias');

        if (button.attr('data-contador') > 0) {
                z += parseInt(button.attr('data-contador'));
        }
        button.click (function(e) {
            e.preventDefault();     //prevenir novos clicks
            if (z < campos_max) {
                    
                    $('#listas_experiencias').append('<div class="col s12">\
                        <div class="row"></div>\
                        <div class="input-field col s6">\
                        <input type="text" name="experiencias['+z+'][empresa]">\
                        <label>Empresa</label>\
                        </div>\
                        <div class="input-field col s6">\
                        <input type="text" name="experiencias['+z+'][funcao]">\
                        <label>Função</label>\
                        </div>\
                        <div class="input-field col s12">\
                                <p>Período</p>\
                        </div>\
                        <div class="input-field col s3">\
                        <input type="text" class="datepicker" name="experiencias['+z+'][dataInE]">\
                        <label>Data de inicio</label>\
                        </div>\
                        <div class="input-field col s3">\
                        <input type="text" class="datepicker" name="experiencias['+z+'][dataTermE]">\
                        <label>Data de fim</label>\
                        </div>\
                        <div class="input-field col s6">\
                        <input type="text" name="experiencias['+z+'][atividade]">\
                        <label>Atividades Desempenhadas</label>\
                        </div>\
                                <a href="#" class="remover_campo">Remover</a>\
                        </div>');
                    z++;
            }
    });
    // Remover o div anterior
    $('#listas_experiencias').on("click",".remover_campo",function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            z--;
    });
  
});
  