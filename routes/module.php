<?php
        
// Start Routes for categorias 
Route::get('categorias','CategoriasController@getIndex');
Route::get('categorias/show/{any?}','CategoriasController@getShow');
Route::get('categorias/update/{any?}','CategoriasController@getUpdate');
Route::get('categorias/comboselect','CategoriasController@getComboselect');
Route::get('categorias/download','CategoriasController@getDownload');
Route::get('categorias/search/{any?}','CategoriasController@getSearch');
Route::get('categorias/export/{any?}','CategoriasController@getExport');
Route::get('categorias/expotion','CategoriasController@getExpotion');
Route::get('categorias/lookup/{id?}/{id2?}','CategoriasController@getLookup');
Route::get('categorias/data','CategoriasController@postData');
Route::get('categorias/import','CategoriasController@getImport');
// -- Post Method --
Route::post('categorias/data','CategoriasController@postData');
Route::post('categorias/save/{any?}','CategoriasController@postSave');
Route::post('categorias/copy','CategoriasController@postCopy');
Route::post('categorias/filter','CategoriasController@postFilter');
Route::post('categorias/delete/{any?}','CategoriasController@postDelete');
Route::post('categorias/savepublic','CategoriasController@postSavepublic');
Route::post('categorias/import','CategoriasController@postImport');
// End Routes for categorias 

                    
// Start Routes for subcategorias 
Route::get('subcategorias','SubcategoriasController@getIndex');
Route::get('subcategorias/show/{any?}','SubcategoriasController@getShow');
Route::get('subcategorias/update/{any?}','SubcategoriasController@getUpdate');
Route::get('subcategorias/comboselect','SubcategoriasController@getComboselect');
Route::get('subcategorias/download','SubcategoriasController@getDownload');
Route::get('subcategorias/search/{any?}','SubcategoriasController@getSearch');
Route::get('subcategorias/export/{any?}','SubcategoriasController@getExport');
Route::get('subcategorias/expotion','SubcategoriasController@getExpotion');
Route::get('subcategorias/lookup/{id?}/{id2?}','SubcategoriasController@getLookup');
Route::get('subcategorias/data','SubcategoriasController@postData');
Route::get('subcategorias/import','SubcategoriasController@getImport');
// -- Post Method --
Route::post('subcategorias/data','SubcategoriasController@postData');
Route::post('subcategorias/save/{any?}','SubcategoriasController@postSave');
Route::post('subcategorias/copy','SubcategoriasController@postCopy');
Route::post('subcategorias/filter','SubcategoriasController@postFilter');
Route::post('subcategorias/delete/{any?}','SubcategoriasController@postDelete');
Route::post('subcategorias/savepublic','SubcategoriasController@postSavepublic');
Route::post('subcategorias/import','SubcategoriasController@postImport');
// End Routes for subcategorias 

                    
// Start Routes for clasificacion 
Route::get('clasificacion','ClasificacionController@getIndex');
Route::get('clasificacion/show/{any?}','ClasificacionController@getShow');
Route::get('clasificacion/update/{any?}','ClasificacionController@getUpdate');
Route::get('clasificacion/comboselect','ClasificacionController@getComboselect');
Route::get('clasificacion/download','ClasificacionController@getDownload');
Route::get('clasificacion/search/{any?}','ClasificacionController@getSearch');
Route::get('clasificacion/export/{any?}','ClasificacionController@getExport');
Route::get('clasificacion/expotion','ClasificacionController@getExpotion');
Route::get('clasificacion/lookup/{id?}/{id2?}','ClasificacionController@getLookup');
Route::get('clasificacion/data','ClasificacionController@postData');
Route::get('clasificacion/import','ClasificacionController@getImport');
// -- Post Method --
Route::post('clasificacion/data','ClasificacionController@postData');
Route::post('clasificacion/save/{any?}','ClasificacionController@postSave');
Route::post('clasificacion/copy','ClasificacionController@postCopy');
Route::post('clasificacion/filter','ClasificacionController@postFilter');
Route::post('clasificacion/delete/{any?}','ClasificacionController@postDelete');
Route::post('clasificacion/savepublic','ClasificacionController@postSavepublic');
Route::post('clasificacion/import','ClasificacionController@postImport');
// End Routes for clasificacion 

                    
// Start Routes for secretarias 
Route::get('secretarias','SecretariasController@getIndex');
Route::get('secretarias/show/{any?}','SecretariasController@getShow');
Route::get('secretarias/update/{any?}','SecretariasController@getUpdate');
Route::get('secretarias/comboselect','SecretariasController@getComboselect');
Route::get('secretarias/download','SecretariasController@getDownload');
Route::get('secretarias/search/{any?}','SecretariasController@getSearch');
Route::get('secretarias/export/{any?}','SecretariasController@getExport');
Route::get('secretarias/expotion','SecretariasController@getExpotion');
Route::get('secretarias/lookup/{id?}/{id2?}','SecretariasController@getLookup');
Route::get('secretarias/data','SecretariasController@postData');
Route::get('secretarias/import','SecretariasController@getImport');
// -- Post Method --
Route::post('secretarias/data','SecretariasController@postData');
Route::post('secretarias/save/{any?}','SecretariasController@postSave');
Route::post('secretarias/copy','SecretariasController@postCopy');
Route::post('secretarias/filter','SecretariasController@postFilter');
Route::post('secretarias/delete/{any?}','SecretariasController@postDelete');
Route::post('secretarias/savepublic','SecretariasController@postSavepublic');
Route::post('secretarias/import','SecretariasController@postImport');
// End Routes for secretarias 

                    
// Start Routes for dependencias 
Route::get('dependencias','DependenciasController@getIndex');
Route::get('dependencias/show/{any?}','DependenciasController@getShow');
Route::get('dependencias/update/{any?}','DependenciasController@getUpdate');
Route::get('dependencias/comboselect','DependenciasController@getComboselect');
Route::get('dependencias/download','DependenciasController@getDownload');
Route::get('dependencias/search/{any?}','DependenciasController@getSearch');
Route::get('dependencias/export/{any?}','DependenciasController@getExport');
Route::get('dependencias/expotion','DependenciasController@getExpotion');
Route::get('dependencias/lookup/{id?}/{id2?}','DependenciasController@getLookup');
Route::get('dependencias/data','DependenciasController@postData');
Route::get('dependencias/import','DependenciasController@getImport');
// -- Post Method --
Route::post('dependencias/data','DependenciasController@postData');
Route::post('dependencias/save/{any?}','DependenciasController@postSave');
Route::post('dependencias/copy','DependenciasController@postCopy');
Route::post('dependencias/filter','DependenciasController@postFilter');
Route::post('dependencias/delete/{any?}','DependenciasController@postDelete');
Route::post('dependencias/savepublic','DependenciasController@postSavepublic');
Route::post('dependencias/import','DependenciasController@postImport');
// End Routes for dependencias 

                    
// Start Routes for categoriastecnicos 
Route::get('categoriastecnicos','CategoriastecnicosController@getIndex');
Route::get('categoriastecnicos/show/{any?}','CategoriastecnicosController@getShow');
Route::get('categoriastecnicos/update/{any?}','CategoriastecnicosController@getUpdate');
Route::get('categoriastecnicos/comboselect','CategoriastecnicosController@getComboselect');
Route::get('categoriastecnicos/download','CategoriastecnicosController@getDownload');
Route::get('categoriastecnicos/search/{any?}','CategoriastecnicosController@getSearch');
Route::get('categoriastecnicos/export/{any?}','CategoriastecnicosController@getExport');
Route::get('categoriastecnicos/expotion','CategoriastecnicosController@getExpotion');
Route::get('categoriastecnicos/lookup/{id?}/{id2?}','CategoriastecnicosController@getLookup');
Route::get('categoriastecnicos/data','CategoriastecnicosController@postData');
Route::get('categoriastecnicos/import','CategoriastecnicosController@getImport');
// -- Post Method --
Route::post('categoriastecnicos/data','CategoriastecnicosController@postData');
Route::post('categoriastecnicos/save/{any?}','CategoriastecnicosController@postSave');
Route::post('categoriastecnicos/copy','CategoriastecnicosController@postCopy');
Route::post('categoriastecnicos/filter','CategoriastecnicosController@postFilter');
Route::post('categoriastecnicos/delete/{any?}','CategoriastecnicosController@postDelete');
Route::post('categoriastecnicos/savepublic','CategoriastecnicosController@postSavepublic');
Route::post('categoriastecnicos/import','CategoriastecnicosController@postImport');
// End Routes for categoriastecnicos 

                    
// Start Routes for cargos 
Route::get('cargos','CargosController@getIndex');
Route::get('cargos/show/{any?}','CargosController@getShow');
Route::get('cargos/update/{any?}','CargosController@getUpdate');
Route::get('cargos/comboselect','CargosController@getComboselect');
Route::get('cargos/download','CargosController@getDownload');
Route::get('cargos/search/{any?}','CargosController@getSearch');
Route::get('cargos/export/{any?}','CargosController@getExport');
Route::get('cargos/expotion','CargosController@getExpotion');
Route::get('cargos/lookup/{id?}/{id2?}','CargosController@getLookup');
Route::get('cargos/data','CargosController@postData');
Route::get('cargos/import','CargosController@getImport');
// -- Post Method --
Route::post('cargos/data','CargosController@postData');
Route::post('cargos/save/{any?}','CargosController@postSave');
Route::post('cargos/copy','CargosController@postCopy');
Route::post('cargos/filter','CargosController@postFilter');
Route::post('cargos/delete/{any?}','CargosController@postDelete');
Route::post('cargos/savepublic','CargosController@postSavepublic');
Route::post('cargos/import','CargosController@postImport');
// End Routes for cargos 

                    
// Start Routes for completarusuarios 
Route::get('completarusuarios','CompletarusuariosController@getIndex');
Route::get('completarusuarios/show/{any?}','CompletarusuariosController@getShow');
Route::get('completarusuarios/update/{any?}','CompletarusuariosController@getUpdate');
Route::get('completarusuarios/comboselect','CompletarusuariosController@getComboselect');
Route::get('completarusuarios/download','CompletarusuariosController@getDownload');
Route::get('completarusuarios/search/{any?}','CompletarusuariosController@getSearch');
Route::get('completarusuarios/export/{any?}','CompletarusuariosController@getExport');
Route::get('completarusuarios/expotion','CompletarusuariosController@getExpotion');
Route::get('completarusuarios/lookup/{id?}/{id2?}','CompletarusuariosController@getLookup');
Route::get('completarusuarios/data','CompletarusuariosController@postData');
Route::get('completarusuarios/import','CompletarusuariosController@getImport');
// -- Post Method --
Route::post('completarusuarios/data','CompletarusuariosController@postData');
Route::post('completarusuarios/save/{any?}','CompletarusuariosController@postSave');
Route::post('completarusuarios/copy','CompletarusuariosController@postCopy');
Route::post('completarusuarios/filter','CompletarusuariosController@postFilter');
Route::post('completarusuarios/delete/{any?}','CompletarusuariosController@postDelete');
Route::post('completarusuarios/savepublic','CompletarusuariosController@postSavepublic');
Route::post('completarusuarios/import','CompletarusuariosController@postImport');
// End Routes for completarusuarios 

                    
// Start Routes for equipos 
Route::get('equipos','EquiposController@getIndex');
Route::get('equipos/show/{any?}','EquiposController@getShow');
Route::get('equipos/update/{any?}','EquiposController@getUpdate');
Route::get('equipos/comboselect','EquiposController@getComboselect');
Route::get('equipos/download','EquiposController@getDownload');
Route::get('equipos/search/{any?}','EquiposController@getSearch');
Route::get('equipos/export/{any?}','EquiposController@getExport');
Route::get('equipos/expotion','EquiposController@getExpotion');
Route::get('equipos/lookup/{id?}/{id2?}','EquiposController@getLookup');
Route::get('equipos/data','EquiposController@postData');
Route::get('equipos/import','EquiposController@getImport');
// -- Post Method --
Route::post('equipos/data','EquiposController@postData');
Route::post('equipos/save/{any?}','EquiposController@postSave');
Route::post('equipos/copy','EquiposController@postCopy');
Route::post('equipos/filter','EquiposController@postFilter');
Route::post('equipos/delete/{any?}','EquiposController@postDelete');
Route::post('equipos/savepublic','EquiposController@postSavepublic');
Route::post('equipos/import','EquiposController@postImport');
// End Routes for equipos 

                    
// Start Routes for tickets 
Route::get('tickets','TicketsController@getIndex');
Route::get('tickets/show/{any?}','TicketsController@getShow');
Route::get('tickets/update/{any?}','TicketsController@getUpdate');
Route::get('tickets/comboselect','TicketsController@getComboselect');
Route::get('tickets/download','TicketsController@getDownload');
Route::get('tickets/search/{any?}','TicketsController@getSearch');
Route::get('tickets/export/{any?}','TicketsController@getExport');
Route::get('tickets/expotion','TicketsController@getExpotion');
Route::get('tickets/lookup/{id?}/{id2?}','TicketsController@getLookup');
Route::get('tickets/data','TicketsController@postData');
Route::get('tickets/import','TicketsController@getImport');
// -- Post Method --
Route::post('tickets/data','TicketsController@postData');
Route::post('tickets/save/{any?}','TicketsController@postSave');
Route::post('tickets/copy','TicketsController@postCopy');
Route::post('tickets/filter','TicketsController@postFilter');
Route::post('tickets/delete/{any?}','TicketsController@postDelete');
Route::post('tickets/savepublic','TicketsController@postSavepublic');
Route::post('tickets/import','TicketsController@postImport');
// End Routes for tickets 

                    
// Start Routes for calificaciontickets 
Route::get('calificaciontickets','CalificacionticketsController@getIndex');
Route::get('calificaciontickets/show/{any?}','CalificacionticketsController@getShow');
Route::get('calificaciontickets/update/{any?}','CalificacionticketsController@getUpdate');
Route::get('calificaciontickets/comboselect','CalificacionticketsController@getComboselect');
Route::get('calificaciontickets/download','CalificacionticketsController@getDownload');
Route::get('calificaciontickets/search/{any?}','CalificacionticketsController@getSearch');
Route::get('calificaciontickets/export/{any?}','CalificacionticketsController@getExport');
Route::get('calificaciontickets/expotion','CalificacionticketsController@getExpotion');
Route::get('calificaciontickets/lookup/{id?}/{id2?}','CalificacionticketsController@getLookup');
Route::get('calificaciontickets/data','CalificacionticketsController@postData');
Route::get('calificaciontickets/import','CalificacionticketsController@getImport');
// -- Post Method --
Route::post('calificaciontickets/data','CalificacionticketsController@postData');
Route::post('calificaciontickets/save/{any?}','CalificacionticketsController@postSave');
Route::post('calificaciontickets/copy','CalificacionticketsController@postCopy');
Route::post('calificaciontickets/filter','CalificacionticketsController@postFilter');
Route::post('calificaciontickets/delete/{any?}','CalificacionticketsController@postDelete');
Route::post('calificaciontickets/savepublic','CalificacionticketsController@postSavepublic');
Route::post('calificaciontickets/import','CalificacionticketsController@postImport');
// End Routes for calificaciontickets 

                    
// Start Routes for reportecalificacion 
Route::get('reportecalificacion','ReportecalificacionController@getIndex');
Route::get('reportecalificacion/show/{any?}','ReportecalificacionController@getShow');
Route::get('reportecalificacion/update/{any?}','ReportecalificacionController@getUpdate');
Route::get('reportecalificacion/comboselect','ReportecalificacionController@getComboselect');
Route::get('reportecalificacion/download','ReportecalificacionController@getDownload');
Route::get('reportecalificacion/search/{any?}','ReportecalificacionController@getSearch');
Route::get('reportecalificacion/export/{any?}','ReportecalificacionController@getExport');
Route::get('reportecalificacion/expotion','ReportecalificacionController@getExpotion');
Route::get('reportecalificacion/lookup/{id?}/{id2?}','ReportecalificacionController@getLookup');
Route::get('reportecalificacion/data','ReportecalificacionController@postData');
Route::get('reportecalificacion/import','ReportecalificacionController@getImport');
// -- Post Method --
Route::post('reportecalificacion/data','ReportecalificacionController@postData');
Route::post('reportecalificacion/save/{any?}','ReportecalificacionController@postSave');
Route::post('reportecalificacion/copy','ReportecalificacionController@postCopy');
Route::post('reportecalificacion/filter','ReportecalificacionController@postFilter');
Route::post('reportecalificacion/delete/{any?}','ReportecalificacionController@postDelete');
Route::post('reportecalificacion/savepublic','ReportecalificacionController@postSavepublic');
Route::post('reportecalificacion/import','ReportecalificacionController@postImport');
// End Routes for reportecalificacion 

                    
// Start Routes for tiposequipo 
Route::get('tiposequipo','TiposequipoController@getIndex');
Route::get('tiposequipo/show/{any?}','TiposequipoController@getShow');
Route::get('tiposequipo/update/{any?}','TiposequipoController@getUpdate');
Route::get('tiposequipo/comboselect','TiposequipoController@getComboselect');
Route::get('tiposequipo/download','TiposequipoController@getDownload');
Route::get('tiposequipo/search/{any?}','TiposequipoController@getSearch');
Route::get('tiposequipo/export/{any?}','TiposequipoController@getExport');
Route::get('tiposequipo/expotion','TiposequipoController@getExpotion');
Route::get('tiposequipo/lookup/{id?}/{id2?}','TiposequipoController@getLookup');
Route::get('tiposequipo/data','TiposequipoController@postData');
Route::get('tiposequipo/import','TiposequipoController@getImport');
// -- Post Method --
Route::post('tiposequipo/data','TiposequipoController@postData');
Route::post('tiposequipo/save/{any?}','TiposequipoController@postSave');
Route::post('tiposequipo/copy','TiposequipoController@postCopy');
Route::post('tiposequipo/filter','TiposequipoController@postFilter');
Route::post('tiposequipo/delete/{any?}','TiposequipoController@postDelete');
Route::post('tiposequipo/savepublic','TiposequipoController@postSavepublic');
Route::post('tiposequipo/import','TiposequipoController@postImport');
// End Routes for tiposequipo 

                    
// Start Routes for discosduros 
Route::get('discosduros','DiscosdurosController@getIndex');
Route::get('discosduros/show/{any?}','DiscosdurosController@getShow');
Route::get('discosduros/update/{any?}','DiscosdurosController@getUpdate');
Route::get('discosduros/comboselect','DiscosdurosController@getComboselect');
Route::get('discosduros/download','DiscosdurosController@getDownload');
Route::get('discosduros/search/{any?}','DiscosdurosController@getSearch');
Route::get('discosduros/export/{any?}','DiscosdurosController@getExport');
Route::get('discosduros/expotion','DiscosdurosController@getExpotion');
Route::get('discosduros/lookup/{id?}/{id2?}','DiscosdurosController@getLookup');
Route::get('discosduros/data','DiscosdurosController@postData');
Route::get('discosduros/import','DiscosdurosController@getImport');
// -- Post Method --
Route::post('discosduros/data','DiscosdurosController@postData');
Route::post('discosduros/save/{any?}','DiscosdurosController@postSave');
Route::post('discosduros/copy','DiscosdurosController@postCopy');
Route::post('discosduros/filter','DiscosdurosController@postFilter');
Route::post('discosduros/delete/{any?}','DiscosdurosController@postDelete');
Route::post('discosduros/savepublic','DiscosdurosController@postSavepublic');
Route::post('discosduros/import','DiscosdurosController@postImport');
// End Routes for discosduros 

                    
// Start Routes for tiposdiscoduro 
Route::get('tiposdiscoduro','TiposdiscoduroController@getIndex');
Route::get('tiposdiscoduro/show/{any?}','TiposdiscoduroController@getShow');
Route::get('tiposdiscoduro/update/{any?}','TiposdiscoduroController@getUpdate');
Route::get('tiposdiscoduro/comboselect','TiposdiscoduroController@getComboselect');
Route::get('tiposdiscoduro/download','TiposdiscoduroController@getDownload');
Route::get('tiposdiscoduro/search/{any?}','TiposdiscoduroController@getSearch');
Route::get('tiposdiscoduro/export/{any?}','TiposdiscoduroController@getExport');
Route::get('tiposdiscoduro/expotion','TiposdiscoduroController@getExpotion');
Route::get('tiposdiscoduro/lookup/{id?}/{id2?}','TiposdiscoduroController@getLookup');
Route::get('tiposdiscoduro/data','TiposdiscoduroController@postData');
Route::get('tiposdiscoduro/import','TiposdiscoduroController@getImport');
// -- Post Method --
Route::post('tiposdiscoduro/data','TiposdiscoduroController@postData');
Route::post('tiposdiscoduro/save/{any?}','TiposdiscoduroController@postSave');
Route::post('tiposdiscoduro/copy','TiposdiscoduroController@postCopy');
Route::post('tiposdiscoduro/filter','TiposdiscoduroController@postFilter');
Route::post('tiposdiscoduro/delete/{any?}','TiposdiscoduroController@postDelete');
Route::post('tiposdiscoduro/savepublic','TiposdiscoduroController@postSavepublic');
Route::post('tiposdiscoduro/import','TiposdiscoduroController@postImport');
// End Routes for tiposdiscoduro 

                    
// Start Routes for memoriaram 
Route::get('memoriaram','MemoriaramController@getIndex');
Route::get('memoriaram/show/{any?}','MemoriaramController@getShow');
Route::get('memoriaram/update/{any?}','MemoriaramController@getUpdate');
Route::get('memoriaram/comboselect','MemoriaramController@getComboselect');
Route::get('memoriaram/download','MemoriaramController@getDownload');
Route::get('memoriaram/search/{any?}','MemoriaramController@getSearch');
Route::get('memoriaram/export/{any?}','MemoriaramController@getExport');
Route::get('memoriaram/expotion','MemoriaramController@getExpotion');
Route::get('memoriaram/lookup/{id?}/{id2?}','MemoriaramController@getLookup');
Route::get('memoriaram/data','MemoriaramController@postData');
Route::get('memoriaram/import','MemoriaramController@getImport');
// -- Post Method --
Route::post('memoriaram/data','MemoriaramController@postData');
Route::post('memoriaram/save/{any?}','MemoriaramController@postSave');
Route::post('memoriaram/copy','MemoriaramController@postCopy');
Route::post('memoriaram/filter','MemoriaramController@postFilter');
Route::post('memoriaram/delete/{any?}','MemoriaramController@postDelete');
Route::post('memoriaram/savepublic','MemoriaramController@postSavepublic');
Route::post('memoriaram/import','MemoriaramController@postImport');
// End Routes for memoriaram 

                    
// Start Routes for tipomemoriaram 
Route::get('tipomemoriaram','TipomemoriaramController@getIndex');
Route::get('tipomemoriaram/show/{any?}','TipomemoriaramController@getShow');
Route::get('tipomemoriaram/update/{any?}','TipomemoriaramController@getUpdate');
Route::get('tipomemoriaram/comboselect','TipomemoriaramController@getComboselect');
Route::get('tipomemoriaram/download','TipomemoriaramController@getDownload');
Route::get('tipomemoriaram/search/{any?}','TipomemoriaramController@getSearch');
Route::get('tipomemoriaram/export/{any?}','TipomemoriaramController@getExport');
Route::get('tipomemoriaram/expotion','TipomemoriaramController@getExpotion');
Route::get('tipomemoriaram/lookup/{id?}/{id2?}','TipomemoriaramController@getLookup');
Route::get('tipomemoriaram/data','TipomemoriaramController@postData');
Route::get('tipomemoriaram/import','TipomemoriaramController@getImport');
// -- Post Method --
Route::post('tipomemoriaram/data','TipomemoriaramController@postData');
Route::post('tipomemoriaram/save/{any?}','TipomemoriaramController@postSave');
Route::post('tipomemoriaram/copy','TipomemoriaramController@postCopy');
Route::post('tipomemoriaram/filter','TipomemoriaramController@postFilter');
Route::post('tipomemoriaram/delete/{any?}','TipomemoriaramController@postDelete');
Route::post('tipomemoriaram/savepublic','TipomemoriaramController@postSavepublic');
Route::post('tipomemoriaram/import','TipomemoriaramController@postImport');
// End Routes for tipomemoriaram 

                    
// Start Routes for frecuenciamemoriaram 
Route::get('frecuenciamemoriaram','FrecuenciamemoriaramController@getIndex');
Route::get('frecuenciamemoriaram/show/{any?}','FrecuenciamemoriaramController@getShow');
Route::get('frecuenciamemoriaram/update/{any?}','FrecuenciamemoriaramController@getUpdate');
Route::get('frecuenciamemoriaram/comboselect','FrecuenciamemoriaramController@getComboselect');
Route::get('frecuenciamemoriaram/download','FrecuenciamemoriaramController@getDownload');
Route::get('frecuenciamemoriaram/search/{any?}','FrecuenciamemoriaramController@getSearch');
Route::get('frecuenciamemoriaram/export/{any?}','FrecuenciamemoriaramController@getExport');
Route::get('frecuenciamemoriaram/expotion','FrecuenciamemoriaramController@getExpotion');
Route::get('frecuenciamemoriaram/lookup/{id?}/{id2?}','FrecuenciamemoriaramController@getLookup');
Route::get('frecuenciamemoriaram/data','FrecuenciamemoriaramController@postData');
Route::get('frecuenciamemoriaram/import','FrecuenciamemoriaramController@getImport');
// -- Post Method --
Route::post('frecuenciamemoriaram/data','FrecuenciamemoriaramController@postData');
Route::post('frecuenciamemoriaram/save/{any?}','FrecuenciamemoriaramController@postSave');
Route::post('frecuenciamemoriaram/copy','FrecuenciamemoriaramController@postCopy');
Route::post('frecuenciamemoriaram/filter','FrecuenciamemoriaramController@postFilter');
Route::post('frecuenciamemoriaram/delete/{any?}','FrecuenciamemoriaramController@postDelete');
Route::post('frecuenciamemoriaram/savepublic','FrecuenciamemoriaramController@postSavepublic');
Route::post('frecuenciamemoriaram/import','FrecuenciamemoriaramController@postImport');
// End Routes for frecuenciamemoriaram 

                    
// Start Routes for procesador 
Route::get('procesador','ProcesadorController@getIndex');
Route::get('procesador/show/{any?}','ProcesadorController@getShow');
Route::get('procesador/update/{any?}','ProcesadorController@getUpdate');
Route::get('procesador/comboselect','ProcesadorController@getComboselect');
Route::get('procesador/download','ProcesadorController@getDownload');
Route::get('procesador/search/{any?}','ProcesadorController@getSearch');
Route::get('procesador/export/{any?}','ProcesadorController@getExport');
Route::get('procesador/expotion','ProcesadorController@getExpotion');
Route::get('procesador/lookup/{id?}/{id2?}','ProcesadorController@getLookup');
Route::get('procesador/data','ProcesadorController@postData');
Route::get('procesador/import','ProcesadorController@getImport');
// -- Post Method --
Route::post('procesador/data','ProcesadorController@postData');
Route::post('procesador/save/{any?}','ProcesadorController@postSave');
Route::post('procesador/copy','ProcesadorController@postCopy');
Route::post('procesador/filter','ProcesadorController@postFilter');
Route::post('procesador/delete/{any?}','ProcesadorController@postDelete');
Route::post('procesador/savepublic','ProcesadorController@postSavepublic');
Route::post('procesador/import','ProcesadorController@postImport');
// End Routes for procesador 

                    
// Start Routes for board 
Route::get('board','BoardController@getIndex');
Route::get('board/show/{any?}','BoardController@getShow');
Route::get('board/update/{any?}','BoardController@getUpdate');
Route::get('board/comboselect','BoardController@getComboselect');
Route::get('board/download','BoardController@getDownload');
Route::get('board/search/{any?}','BoardController@getSearch');
Route::get('board/export/{any?}','BoardController@getExport');
Route::get('board/expotion','BoardController@getExpotion');
Route::get('board/lookup/{id?}/{id2?}','BoardController@getLookup');
Route::get('board/data','BoardController@postData');
Route::get('board/import','BoardController@getImport');
// -- Post Method --
Route::post('board/data','BoardController@postData');
Route::post('board/save/{any?}','BoardController@postSave');
Route::post('board/copy','BoardController@postCopy');
Route::post('board/filter','BoardController@postFilter');
Route::post('board/delete/{any?}','BoardController@postDelete');
Route::post('board/savepublic','BoardController@postSavepublic');
Route::post('board/import','BoardController@postImport');
// End Routes for board 

                    
// Start Routes for sistemaoperativo 
Route::get('sistemaoperativo','SistemaoperativoController@getIndex');
Route::get('sistemaoperativo/show/{any?}','SistemaoperativoController@getShow');
Route::get('sistemaoperativo/update/{any?}','SistemaoperativoController@getUpdate');
Route::get('sistemaoperativo/comboselect','SistemaoperativoController@getComboselect');
Route::get('sistemaoperativo/download','SistemaoperativoController@getDownload');
Route::get('sistemaoperativo/search/{any?}','SistemaoperativoController@getSearch');
Route::get('sistemaoperativo/export/{any?}','SistemaoperativoController@getExport');
Route::get('sistemaoperativo/expotion','SistemaoperativoController@getExpotion');
Route::get('sistemaoperativo/lookup/{id?}/{id2?}','SistemaoperativoController@getLookup');
Route::get('sistemaoperativo/data','SistemaoperativoController@postData');
Route::get('sistemaoperativo/import','SistemaoperativoController@getImport');
// -- Post Method --
Route::post('sistemaoperativo/data','SistemaoperativoController@postData');
Route::post('sistemaoperativo/save/{any?}','SistemaoperativoController@postSave');
Route::post('sistemaoperativo/copy','SistemaoperativoController@postCopy');
Route::post('sistemaoperativo/filter','SistemaoperativoController@postFilter');
Route::post('sistemaoperativo/delete/{any?}','SistemaoperativoController@postDelete');
Route::post('sistemaoperativo/savepublic','SistemaoperativoController@postSavepublic');
Route::post('sistemaoperativo/import','SistemaoperativoController@postImport');
// End Routes for sistemaoperativo 

                    
// Start Routes for versionistemaoperativo 
Route::get('versionistemaoperativo','VersionistemaoperativoController@getIndex');
Route::get('versionistemaoperativo/show/{any?}','VersionistemaoperativoController@getShow');
Route::get('versionistemaoperativo/update/{any?}','VersionistemaoperativoController@getUpdate');
Route::get('versionistemaoperativo/comboselect','VersionistemaoperativoController@getComboselect');
Route::get('versionistemaoperativo/download','VersionistemaoperativoController@getDownload');
Route::get('versionistemaoperativo/search/{any?}','VersionistemaoperativoController@getSearch');
Route::get('versionistemaoperativo/export/{any?}','VersionistemaoperativoController@getExport');
Route::get('versionistemaoperativo/expotion','VersionistemaoperativoController@getExpotion');
Route::get('versionistemaoperativo/lookup/{id?}/{id2?}','VersionistemaoperativoController@getLookup');
Route::get('versionistemaoperativo/data','VersionistemaoperativoController@postData');
Route::get('versionistemaoperativo/import','VersionistemaoperativoController@getImport');
// -- Post Method --
Route::post('versionistemaoperativo/data','VersionistemaoperativoController@postData');
Route::post('versionistemaoperativo/save/{any?}','VersionistemaoperativoController@postSave');
Route::post('versionistemaoperativo/copy','VersionistemaoperativoController@postCopy');
Route::post('versionistemaoperativo/filter','VersionistemaoperativoController@postFilter');
Route::post('versionistemaoperativo/delete/{any?}','VersionistemaoperativoController@postDelete');
Route::post('versionistemaoperativo/savepublic','VersionistemaoperativoController@postSavepublic');
Route::post('versionistemaoperativo/import','VersionistemaoperativoController@postImport');
// End Routes for versionistemaoperativo 

                    
// Start Routes for ofimatica 
Route::get('ofimatica','OfimaticaController@getIndex');
Route::get('ofimatica/show/{any?}','OfimaticaController@getShow');
Route::get('ofimatica/update/{any?}','OfimaticaController@getUpdate');
Route::get('ofimatica/comboselect','OfimaticaController@getComboselect');
Route::get('ofimatica/download','OfimaticaController@getDownload');
Route::get('ofimatica/search/{any?}','OfimaticaController@getSearch');
Route::get('ofimatica/export/{any?}','OfimaticaController@getExport');
Route::get('ofimatica/expotion','OfimaticaController@getExpotion');
Route::get('ofimatica/lookup/{id?}/{id2?}','OfimaticaController@getLookup');
Route::get('ofimatica/data','OfimaticaController@postData');
Route::get('ofimatica/import','OfimaticaController@getImport');
// -- Post Method --
Route::post('ofimatica/data','OfimaticaController@postData');
Route::post('ofimatica/save/{any?}','OfimaticaController@postSave');
Route::post('ofimatica/copy','OfimaticaController@postCopy');
Route::post('ofimatica/filter','OfimaticaController@postFilter');
Route::post('ofimatica/delete/{any?}','OfimaticaController@postDelete');
Route::post('ofimatica/savepublic','OfimaticaController@postSavepublic');
Route::post('ofimatica/import','OfimaticaController@postImport');
// End Routes for ofimatica 

                    
// Start Routes for software 
Route::get('software','SoftwareController@getIndex');
Route::get('software/show/{any?}','SoftwareController@getShow');
Route::get('software/update/{any?}','SoftwareController@getUpdate');
Route::get('software/comboselect','SoftwareController@getComboselect');
Route::get('software/download','SoftwareController@getDownload');
Route::get('software/search/{any?}','SoftwareController@getSearch');
Route::get('software/export/{any?}','SoftwareController@getExport');
Route::get('software/expotion','SoftwareController@getExpotion');
Route::get('software/lookup/{id?}/{id2?}','SoftwareController@getLookup');
Route::get('software/data','SoftwareController@postData');
Route::get('software/import','SoftwareController@getImport');
// -- Post Method --
Route::post('software/data','SoftwareController@postData');
Route::post('software/save/{any?}','SoftwareController@postSave');
Route::post('software/copy','SoftwareController@postCopy');
Route::post('software/filter','SoftwareController@postFilter');
Route::post('software/delete/{any?}','SoftwareController@postDelete');
Route::post('software/savepublic','SoftwareController@postSavepublic');
Route::post('software/import','SoftwareController@postImport');
// End Routes for software 

                    
// Start Routes for velocidadsistemaoperativo 
Route::get('velocidadsistemaoperativo','VelocidadsistemaoperativoController@getIndex');
Route::get('velocidadsistemaoperativo/show/{any?}','VelocidadsistemaoperativoController@getShow');
Route::get('velocidadsistemaoperativo/update/{any?}','VelocidadsistemaoperativoController@getUpdate');
Route::get('velocidadsistemaoperativo/comboselect','VelocidadsistemaoperativoController@getComboselect');
Route::get('velocidadsistemaoperativo/download','VelocidadsistemaoperativoController@getDownload');
Route::get('velocidadsistemaoperativo/search/{any?}','VelocidadsistemaoperativoController@getSearch');
Route::get('velocidadsistemaoperativo/export/{any?}','VelocidadsistemaoperativoController@getExport');
Route::get('velocidadsistemaoperativo/expotion','VelocidadsistemaoperativoController@getExpotion');
Route::get('velocidadsistemaoperativo/lookup/{id?}/{id2?}','VelocidadsistemaoperativoController@getLookup');
Route::get('velocidadsistemaoperativo/data','VelocidadsistemaoperativoController@postData');
Route::get('velocidadsistemaoperativo/import','VelocidadsistemaoperativoController@getImport');
// -- Post Method --
Route::post('velocidadsistemaoperativo/data','VelocidadsistemaoperativoController@postData');
Route::post('velocidadsistemaoperativo/save/{any?}','VelocidadsistemaoperativoController@postSave');
Route::post('velocidadsistemaoperativo/copy','VelocidadsistemaoperativoController@postCopy');
Route::post('velocidadsistemaoperativo/filter','VelocidadsistemaoperativoController@postFilter');
Route::post('velocidadsistemaoperativo/delete/{any?}','VelocidadsistemaoperativoController@postDelete');
Route::post('velocidadsistemaoperativo/savepublic','VelocidadsistemaoperativoController@postSavepublic');
Route::post('velocidadsistemaoperativo/import','VelocidadsistemaoperativoController@postImport');
// End Routes for velocidadsistemaoperativo 

                    
// Start Routes for sedes 
Route::get('sedes','SedesController@getIndex');
Route::get('sedes/show/{any?}','SedesController@getShow');
Route::get('sedes/update/{any?}','SedesController@getUpdate');
Route::get('sedes/comboselect','SedesController@getComboselect');
Route::get('sedes/download','SedesController@getDownload');
Route::get('sedes/search/{any?}','SedesController@getSearch');
Route::get('sedes/export/{any?}','SedesController@getExport');
Route::get('sedes/expotion','SedesController@getExpotion');
Route::get('sedes/lookup/{id?}/{id2?}','SedesController@getLookup');
Route::get('sedes/data','SedesController@postData');
Route::get('sedes/import','SedesController@getImport');
// -- Post Method --
Route::post('sedes/data','SedesController@postData');
Route::post('sedes/save/{any?}','SedesController@postSave');
Route::post('sedes/copy','SedesController@postCopy');
Route::post('sedes/filter','SedesController@postFilter');
Route::post('sedes/delete/{any?}','SedesController@postDelete');
Route::post('sedes/savepublic','SedesController@postSavepublic');
Route::post('sedes/import','SedesController@postImport');
// End Routes for sedes 

                    
// Start Routes for marcas 
Route::get('marcas','MarcasController@getIndex');
Route::get('marcas/show/{any?}','MarcasController@getShow');
Route::get('marcas/update/{any?}','MarcasController@getUpdate');
Route::get('marcas/comboselect','MarcasController@getComboselect');
Route::get('marcas/download','MarcasController@getDownload');
Route::get('marcas/search/{any?}','MarcasController@getSearch');
Route::get('marcas/export/{any?}','MarcasController@getExport');
Route::get('marcas/expotion','MarcasController@getExpotion');
Route::get('marcas/lookup/{id?}/{id2?}','MarcasController@getLookup');
Route::get('marcas/data','MarcasController@postData');
Route::get('marcas/import','MarcasController@getImport');
// -- Post Method --
Route::post('marcas/data','MarcasController@postData');
Route::post('marcas/save/{any?}','MarcasController@postSave');
Route::post('marcas/copy','MarcasController@postCopy');
Route::post('marcas/filter','MarcasController@postFilter');
Route::post('marcas/delete/{any?}','MarcasController@postDelete');
Route::post('marcas/savepublic','MarcasController@postSavepublic');
Route::post('marcas/import','MarcasController@postImport');
// End Routes for marcas 

                    
// Start Routes for modelos 
Route::get('modelos','ModelosController@getIndex');
Route::get('modelos/show/{any?}','ModelosController@getShow');
Route::get('modelos/update/{any?}','ModelosController@getUpdate');
Route::get('modelos/comboselect','ModelosController@getComboselect');
Route::get('modelos/download','ModelosController@getDownload');
Route::get('modelos/search/{any?}','ModelosController@getSearch');
Route::get('modelos/export/{any?}','ModelosController@getExport');
Route::get('modelos/expotion','ModelosController@getExpotion');
Route::get('modelos/lookup/{id?}/{id2?}','ModelosController@getLookup');
Route::get('modelos/data','ModelosController@postData');
Route::get('modelos/import','ModelosController@getImport');
// -- Post Method --
Route::post('modelos/data','ModelosController@postData');
Route::post('modelos/save/{any?}','ModelosController@postSave');
Route::post('modelos/copy','ModelosController@postCopy');
Route::post('modelos/filter','ModelosController@postFilter');
Route::post('modelos/delete/{any?}','ModelosController@postDelete');
Route::post('modelos/savepublic','ModelosController@postSavepublic');
Route::post('modelos/import','ModelosController@postImport');
// End Routes for modelos 

                    
// Start Routes for asignacionequipos 
Route::get('asignacionequipos','AsignacionequiposController@getIndex');
Route::get('asignacionequipos/show/{any?}','AsignacionequiposController@getShow');
Route::get('asignacionequipos/update/{any?}','AsignacionequiposController@getUpdate');
Route::get('asignacionequipos/comboselect','AsignacionequiposController@getComboselect');
Route::get('asignacionequipos/download','AsignacionequiposController@getDownload');
Route::get('asignacionequipos/search/{any?}','AsignacionequiposController@getSearch');
Route::get('asignacionequipos/export/{any?}','AsignacionequiposController@getExport');
Route::get('asignacionequipos/expotion','AsignacionequiposController@getExpotion');
Route::get('asignacionequipos/lookup/{id?}/{id2?}','AsignacionequiposController@getLookup');
Route::get('asignacionequipos/data','AsignacionequiposController@postData');
Route::get('asignacionequipos/import','AsignacionequiposController@getImport');
// -- Post Method --
Route::post('asignacionequipos/data','AsignacionequiposController@postData');
Route::post('asignacionequipos/save/{any?}','AsignacionequiposController@postSave');
Route::post('asignacionequipos/copy','AsignacionequiposController@postCopy');
Route::post('asignacionequipos/filter','AsignacionequiposController@postFilter');
Route::post('asignacionequipos/delete/{any?}','AsignacionequiposController@postDelete');
Route::post('asignacionequipos/savepublic','AsignacionequiposController@postSavepublic');
Route::post('asignacionequipos/import','AsignacionequiposController@postImport');
// End Routes for asignacionequipos 

                    
// Start Routes for trazabilidadticket 
Route::get('trazabilidadticket','TrazabilidadticketController@getIndex');
Route::get('trazabilidadticket/show/{any?}','TrazabilidadticketController@getShow');
Route::get('trazabilidadticket/update/{any?}','TrazabilidadticketController@getUpdate');
Route::get('trazabilidadticket/comboselect','TrazabilidadticketController@getComboselect');
Route::get('trazabilidadticket/download','TrazabilidadticketController@getDownload');
Route::get('trazabilidadticket/search/{any?}','TrazabilidadticketController@getSearch');
Route::get('trazabilidadticket/export/{any?}','TrazabilidadticketController@getExport');
Route::get('trazabilidadticket/expotion','TrazabilidadticketController@getExpotion');
Route::get('trazabilidadticket/lookup/{id?}/{id2?}','TrazabilidadticketController@getLookup');
Route::get('trazabilidadticket/data','TrazabilidadticketController@postData');
Route::get('trazabilidadticket/import','TrazabilidadticketController@getImport');
// -- Post Method --
Route::post('trazabilidadticket/data','TrazabilidadticketController@postData');
Route::post('trazabilidadticket/save/{any?}','TrazabilidadticketController@postSave');
Route::post('trazabilidadticket/copy','TrazabilidadticketController@postCopy');
Route::post('trazabilidadticket/filter','TrazabilidadticketController@postFilter');
Route::post('trazabilidadticket/delete/{any?}','TrazabilidadticketController@postDelete');
Route::post('trazabilidadticket/savepublic','TrazabilidadticketController@postSavepublic');
Route::post('trazabilidadticket/import','TrazabilidadticketController@postImport');
// End Routes for trazabilidadticket 

                    ?>