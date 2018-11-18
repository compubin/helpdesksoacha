$(window).load(function () {

    let add_tr = 'button.btn-add-tr';
    let delete_tr = 'button.btn-delete-tr';

    let add_tv = 'button.btn-add-tv';
    let delete_tv = 'button.btn-delete-tv';

    let table = $('table');

    let marcas_select = $('select.marcas_select');

    marcas_select.select2();

    table.on('click', add_tr, function (e) {
        e.preventDefault();
        let el = $(this);
        let content = el.closest('table').find('tbody');
        let tr = content.find('tr:first').clone();
        tr.find('input').val('');
        content.append(tr);
    });

    table.on('click', delete_tr, function (e) {
        e.preventDefault();
        let el = $(this);
        el.closest('tr').remove();
    });

    table.on('click', add_tv, function (e) {
        e.preventDefault();
        let el = $(this);
        let content = el.closest('table').find('tbody');
        let tr = content.find('tr:first').clone();
        tr.find('input').val('');
        tr.find('select').val('');
        select2Refresh(tr.find('select'));
        content.append(tr);
    });

    table.on('click', delete_tv, function (e) {
        e.preventDefault();
        let el = $(this);
        el.closest('tr').remove();
    });



    function select2Refresh(element)
    {
        element.prev('.select2-container').remove();
        element.select2();
    }

});