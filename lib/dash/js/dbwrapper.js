var DbWrapper = Class.create({
  table: '',
  get: function( id, callback ) {
    $.getJSON('driver.php', { table: this.table, method: 'get', id: id }, callback );
  },
  getAll: function( callback, params ) {
    if ( params == null ) params = {};
    params.table = this.table;
    params.method = 'getAll';
    $.getJSON('driver.php', params, callback );
  },
  insertObject: function( params, callback ) {
    params.table = this.table;
    params.method = 'insert';
    $.getJSON('driver.php', params, callback );
  },
  updateObject: function( id, params, callback ) {
    params.table = this.table;
    params['id'] = id;
    params.method = 'insert';
    $.getJSON('driver.php', params, callback );
  },
  deleteObject: function( id, callback ) {
    $.getJSON('driver.php', { table:this.table,
        'id':id, method: 'delete' }, callback );
  }
});
