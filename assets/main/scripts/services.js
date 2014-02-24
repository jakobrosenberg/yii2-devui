/**
 * Created by Jakob
 * Date: 24-02-14
 * Time: 23:22
 */

var devuiServices = angular.module('devuiServices', ['ngResource']);

devuiServices.factory('Command', ['$resource',
	function($resource){
		return $resource('/devui/api/v1/commandhistory', {}, {
			query: {method:'GET', params:{id:'1'}, isArray:false}
	})
}])