var myApp = angular.module('myApp', []);
myApp.controller('myController', function($scope){

	// console.log("hello angular...");
   $scope.newUser = {};
   $scope.clickedUser = {};
   $scope.message = "";
   var users = [
              {name:'pankaj', fullName:'pankaj kumar gouraw', email:'pgouraw@gmail.com'},
              {name:'shweta', fullName:'shweta prabhu', email:'shweta@gmail.com'},
              {name:'subhoo', fullName:'subho deep', email:'deepsubhoo@gmail.com'}

   ];
   $scope.users = users;

   $scope.saveUser = function(){
   	// console.log($scope.newUser);
   	$scope.users.push($scope.newUser);
   	$scope.newUser = {};
   	$scope.message = "new user added successfully !....";
   };

   $scope.selectUser = function(user){
      // console.log(user);
    $scope.clickedUser = user;
   };

   $scope.updateUser = function(){
       $scope.message = "user information updated successfully !...";
   };

   $scope.deleteUser = function(){
      $scope.users.splice($scope.users.indexOf($scope.clickedUser),1);
      $scope.message = "user deleted successfully !....";
   };

   $scope.clearMessage = function(){
   	  $scope.message = "";
   }

});
