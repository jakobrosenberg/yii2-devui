/**
 * Created by Jakob
 * Date: 24-02-14
 * Time: 23:48
 */

var devuiControllers = angular.module('devuiControllers', []);




devuiControllers.controller('CommandListCtrl', ['$scope', 'Command', function($scope, Command) {
	$scope.commands = Command.query();
	$scope.test = 'test';
}])