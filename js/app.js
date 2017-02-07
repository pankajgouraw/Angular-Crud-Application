
var myApp = angular.module('myApp', ["firebase"]);
myApp.controller('myController', function($scope, $firebaseArray){
     var database = firebase.database();
     var ref = database.ref('users');
 var myProduct = new Firebase("https://angular-crud-application.firebaseio.com/users");
  
  $scope.users = $firebaseArray(myProduct);
  console.log($scope.users);
  
   $scope.newUser = {};
   $scope.clickedUser = {};
   $scope.message = ""; 

   $scope.saveUser = function(){
    ref.push($scope.newUser);
   	$scope.newUser = {};
   	$scope.message = "new user added successfully !....";
   };

   $scope.selectUser = function(user){
    $scope.clickedUser = user;
   };

   $scope.updateUser = function(){
      $scope.users.$save($scope.clickedUser);
      console.log($scope.clickedUser);
       $scope.message = "user information updated successfully !...";
   };

   $scope.deleteUser = function(){
      // $scope.users.splice($scope.users.indexOf($scope.clickedUser),1);
      $scope.users.$remove($scope.clickedUser);
      $scope.message = "user deleted successfully !....";
   };

   $scope.clearMessage = function(){
   	  $scope.message = "";
   }

});
