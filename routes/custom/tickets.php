<?php

Route::post('auto-assign-ticket','CustomTicketsController@autoAssignTicket')->name('auto-assign-ticket');

Route::group(['prefix' => 'datatable'], function () {
    Route::get('tickets', 'DataTableController@getTickets')->name('datatable.tickets');
    Route::get('usuarios', 'DataTableController@getUsuarios')->name('datatable-usuarios');
    Route::get('tb_users', 'DataTableController@getUsers')->name('datatable-users');
    Route::get('calificacion', 'DataTableController@getCalificacion')->name('datatable-calificacion');
    Route::get('trazabilidad_tickets', 'DataTableController@getTrazabilidadTickets')->name('datatable.trazabilidad_tickets');
});

Route::group(['prefix' => 'reportes'], function () {
    Route::get('/', 'ReportesController@index')->name('reportes.index');
    Route::post('/descargar', 'ReportesController@generate')->name('reportes.generate');
});