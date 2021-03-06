<!doctype>
<html ng-app="myApp">
<head>
	<title>angular crud application</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body  ng-controller="myController">

	<div class="container">
	<hr>

		<button class="but btn-info btn-lg pull-right" data-toggle="modal" data-target="#addUsers" type="button">Add New</button>

		<div id="addUsers" class="modal fade" role="dialog">
			<div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Add New User</h4>
		      </div>
			      <div class="modal-body">
				        <form class="form-horizontal" role="form" >
				        	<div class="form-group">
				        		<label class="control-label col-sm-3">User Name</label>
				        		<div class="col-sm-9">
				        			<input type="text" class="form-control" ng-model="newUser.name">
				        		</div>
				        	</div>

				        	<div class="form-group">
				        		<label class="control-label col-sm-3">Full Name</label>
				        		<div class="col-sm-9">
				        			<input type="text" class="form-control" ng-model="newUser.fullName">
				        		</div>
				        	</div>

				        	<div class="form-group">
				        		<label class="control-label col-sm-3">Email</label>
				        		<div class="col-sm-9">
				        			<input type="text" class="form-control" ng-model="newUser.email">
				        		</div>
				        	</div>

				        	<div class="form-group">
				        		<div class="col-sm-offset-3 col-sm-9">
				        			<button type="button" data-dismiss="modal" class="btn btn-default" ng-click="saveUser()" > Save</button>
				        		</div>
				        	</div>
				        </form>
			      </div>
			      <div class="modal-footer">
			           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
		    </div>

		  </div>
		</div>

	    <h1>All Users</h1>
		<span class="clearfix"></span>
    	<hr>

      	<div class="alert alert-success alert-dismissable" ng-if="message">
		  <a href="#" class="close" ng-click="clearMessage()">&times;</a>
		  <p style="color:#0F5905;">{{message}}</p>
	  	</div>

	    <table class="table table-striped">
	    	<thead>
	    		<th>index</th>
	    		<th>first name</th>
	    		<th>Full name</th>
	    		<th>email</th>
	    		<th>edit</th>
	    		<th>delete</th>
	    	</thead>
	    	<tr ng-repeat="user in users">
	    		<td>{{$index+1}}</td>
	    		<td>{{user.name}}</td>
	    		<td>{{user.fullName}}</td>
	    		<td>{{user.email}}</td>
	    		<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUsers" ng-click="selectUser(user)">Edit</button></td>

	    		<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUsers" ng-click="selectUser(user)">Delete</button></td>
	    	</tr>
	    	
	    </table>
     <!-- edit users -->
    	<div id="editUsers" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
			    <div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Edit User</h4>
				    </div>

			        <div class="modal-body">
				        <form class="form-horizontal" role="form" >

				        	<div class="form-group">
				        		<label class="control-label col-sm-3">User Name</label>
				        		<div class="col-sm-9">
				        			<input type="text" class="form-control" ng-model="clickedUser.name">
				        		</div>
				        	</div>
		                    
		                    <div class="form-group">
				        		<label class="control-label col-sm-3">Full Name</label>
				        		<div class="col-sm-9">
				        			<input type="text" class="form-control" ng-model="clickedUser.fullName">
				        		</div>
				        	</div>

				        	<div class="form-group">
				        		<label class="control-label col-sm-3">Email</label>
				        		<div class="col-sm-9">
				        			<input type="text" class="form-control" ng-model="clickedUser.email">
				        		</div>
				        	</div>



				           <div class="form-group">
				        		<div class="col-sm-offset-3 col-sm-9">
				        			<button type="button" data-dismiss="modal" ng-click="updateUser()" class="btn btn-default" > Save</button>
				        		</div>
				        	</div>
				        </form>
					</div>
			        <div class="modal-footer">
		            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		            </div>
		       </div>

		    </div>
		</div>

		<!-- delete users -->

		<div id="deleteUsers" class="modal fade" role="dialog">
		    <div class="modal-dialog">

		    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Delete User</h4>
			      </div>
			      <div class="modal-body">
			        <strong style="color:red;">
			        	Are You Sure want to delete  {{clickedUser.fullName}}.
			        </strong>
			      </div>
			      <div class="modal-footer">
			       <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="deleteUser()">Yes</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			      </div>
			    </div>

		   </div>
		</div>
			
	</div>
	             

<!-- AngularJS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script> -->
<!-- Firebase -->
<script src="https://www.gstatic.com/firebasejs/3.6.2/firebase-app.js"></script>
<!-- Firebase -->
<script src="https://cdn.firebase.com/js/client/2.2.4/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.6.2/firebase.js"></script>

<script src="https://cdn.firebase.com/libs/angularfire/1.2.0/angularfire.min.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCLcNVdD2D-qdJG40XOn1Xa_Dzs0TbJUuQ",
    authDomain: "angular-crud-application.firebaseapp.com",
    databaseURL: "https://angular-crud-application.firebaseio.com",
    storageBucket: "angular-crud-application.appspot.com",
    messagingSenderId: "121983694542"
  };
  firebase.initializeApp(config);
</script>
	
	<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
</body>
</html>