<?php
//-------------------------------------------------------------------------
/* Start Module Routes */


Route::get('tecno/module','ModuleController@index');
Route::get('tecno/module/create','ModuleController@getCreate');
Route::get('tecno/module/rebuild/{any}','ModuleController@getRebuild');
Route::get('tecno/module/build/{any}','ModuleController@getBuild');
Route::get('tecno/module/config/{any}','ModuleController@getConfig');
Route::get('tecno/module/sql/{any}','ModuleController@getSql');
Route::get('tecno/module/table/{any}','ModuleController@getTable');
Route::get('tecno/module/form/{any}','ModuleController@getForm');
Route::get('tecno/module/formdesign/{any}','ModuleController@getFormdesign');
Route::get('tecno/module/subform/{any}','ModuleController@getSubform');
Route::get('tecno/module/subformremove/{any}','ModuleController@getSubformremove');
Route::get('tecno/module/sub/{any}','ModuleController@getSub');
Route::get('tecno/module/removesub','ModuleController@getRemovesub');
Route::get('tecno/module/permission/{any}','ModuleController@getPermission');
Route::get('tecno/module/source/{any}','ModuleController@getSource');
Route::get('tecno/module/combotable','ModuleController@getCombotable');
Route::get('tecno/module/combotablefield','ModuleController@getCombotablefield');
Route::get('tecno/module/editform/{any?}','ModuleController@getEditform');
Route::get('tecno/module/destroy/{any?}','ModuleController@getDestroy');
Route::get('tecno/module/conn/{any?}','ModuleController@getConn');
Route::get('tecno/module/code/{any?}','ModuleController@getCode');
Route::get('tecno/module/duplicate/{any?}','ModuleController@getDuplicate');

/* POST METHODE */
Route::post('tecno/module/create','ModuleController@postCreate');
Route::post('tecno/module/saveconfig/{any}','ModuleController@postSaveconfig');
Route::post('tecno/module/savesetting/{any}','ModuleController@postSavesetting');
Route::post('tecno/module/savesql/{any}','ModuleController@postSavesql');
Route::post('tecno/module/savetable/{any}','ModuleController@postSavetable');
Route::post('tecno/module/saveform/{any}','ModuleController@postSaveForm');
Route::post('tecno/module/savesubform/{any}','ModuleController@postSavesubform');
Route::post('tecno/module/formdesign/{any}','ModuleController@postFormdesign');
Route::post('tecno/module/savepermission/{any}','ModuleController@postSavePermission');
Route::post('tecno/module/savesub/{any}','ModuleController@postSaveSub');
Route::post('tecno/module/dobuild/{any}','ModuleController@postDobuild');
Route::post('tecno/module/source/{any}','ModuleController@postSource');
Route::post('tecno/module/install','ModuleController@postInstall');
Route::post('tecno/module/package','ModuleController@postPackage');
Route::post('tecno/module/dopackage','ModuleController@postDopackage');
Route::post('tecno/module/saveformfield/{any?}','ModuleController@postSaveformfield');
Route::post('tecno/module/conn/{any?}','ModuleController@postConn');
Route::post('tecno/module/code/{any?}','ModuleController@postCode');
Route::post('tecno/module/duplicate/{any?}','ModuleController@postDuplicate');



/* End  Module Routes */
//-------------------------------------------------------------------------

/* Start  Code Routes */
Route::get('tecno/code','CodeController@index');
Route::get('tecno/code/edit','CodeController@getEdit');
Route::post('tecno/code/source/{any?}','CodeController@PostSource');
Route::post('tecno/code/save','CodeController@PostSave');

Route::get('tecno/config/email','ConfigController@getEmail');
Route::get('tecno/config/security','ConfigController@getSecurity');
Route::post('tecno/code/source/:any','ConfigController@postSource');
/* End  Code Routes */

//-------------------------------------------------------------------------
/* Start  Config Routes */
Route::get('tecno/config','ConfigController@getIndex');
Route::get('tecno/config/email','ConfigController@getEmail');
Route::get('tecno/config/security','ConfigController@getSecurity');
Route::get('tecno/config/translation','ConfigController@getTranslation');
Route::get('tecno/config/log','ConfigController@getLog');
Route::get('tecno/config/clearlog','ConfigController@getClearlog');
Route::get('tecno/config/addtranslation','ConfigController@getAddtranslation');
Route::get('tecno/config/removetranslation/{any}','ConfigController@getRemovetranslation');
// POST METHOD
Route::post('tecno/config/save','ConfigController@postSave');
Route::post('tecno/config/email','ConfigController@postEmail');
Route::post('tecno/config/login','ConfigController@postLogin');
Route::post('tecno/config/email','ConfigController@postEmail');
Route::post('tecno/config/addtranslation','ConfigController@postAddtranslation');
Route::post('tecno/config/savetranslation','ConfigController@postSavetranslation');
/* End  Config Routes */

//-------------------------------------------------------------------------
/* Start  Menu Routes */
Route::get('tecno/menu/','MenuController@getIndex');
Route::get('tecno/menu/index/{any?}','MenuController@getIndex');
Route::get('tecno/menu/destroy/{any?}','MenuController@getDestroy');
Route::get('tecno/menu/icon','MenuController@getIcons');

Route::post('tecno/menu/save','MenuController@postSave');
Route::post('tecno/menu/saveorder','MenuController@postSaveorder');
/* End  Config Routes */

//-------------------------------------------------------------------------
/* Start  Tables Routes */
Route::get('tecno/tables','TablesController@index');
Route::get('tecno/tables/tableconfig/{any}','TablesController@getTableconfig');
Route::get('tecno/tables/mysqleditor','TablesController@getMysqleditor');
Route::get('tecno/tables/tableconfig','TablesController@getTableconfig');
Route::get('tecno/tables/tablefieldedit/{any}','TablesController@getTablefieldedit');
Route::get('tecno/tables/tablefieldremove/{id?}/{id2?}','TablesController@getTablefieldremove');
// POST METHOD
Route::post('tecno/tables/tableremove','TablesController@postTableremove');
Route::post('tecno/tables/tableinfo/{any}','TablesController@postTableinfo');
Route::post('tecno/tables/mysqleditor','TablesController@postMysqleditor');
Route::post('tecno/tables/tablefieldsave/{any?}','TablesController@postTablefieldsave');
Route::post('tecno/tables/tables','TablesController@postTables');
/* End  Tables Routes */


//-------------------------------------------------------------------------
/* Start Logs Routes */
// -- Get Method --
Route::get('tecno/rac','RacController@getIndex');
Route::get('tecno/rac/show/{any}','RacController@getShow');
Route::get('tecno/rac/update/{any?}','RacController@getUpdate');
Route::get('tecno/rac/comboselect','RacController@getComboselect');
Route::get('tecno/rac/download','RacController@getDownload');
Route::get('tecno/rac/search','RacController@getSearch');

// -- Post Method --
Route::post('tecno/rac/save','RacController@postSave');
Route::post('tecno/rac/filter','RacController@postFilter');
Route::post('tecno/rac/delete/{any?}','RacController@postDelete');
/* End  Tables Routes */

