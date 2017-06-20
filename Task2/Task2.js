var form = angular.module('form', ['toastr']);

form.controller('FormController', function FormController($scope, toastr) {
  
  $scope.totalUsers = [];

  init();

  function init(){
    console.log('init');

    $scope.date = new Date();
    $scope.user = {}
  }

  function onSubmit(){
    console.log('user', $scope.user);
  }

  $scope.update = function(user){
    console.log(user);

    if(Object.keys(user).length === 0){
      toastr.error('Please fill the form before submitting');
    }
    else if(user.email.indexOf('@') == -1){
      toastr.error('Email must be valid');
      user.email = '';
    } else{
      $scope.currentUser = angular.copy(user);
      $scope.currentUser.phone = $scope.num1 + '' + $scope.num2 + '' + $scope.num3;

      $scope.totalUsers.push($scope.currentUser);

      toastr.success('Submission added!');
      reset();
    }
  }

  function reset(){
    $scope.user = {};
    $scope.num1 = '';
    $scope.num2 = '';
    $scope.num3 = '';
  }
});