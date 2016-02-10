var baseU="";
var appfuncionario = angular.module("asambleaApp", ['ui.router','ngSanitize']);


appfuncionario.controller("Cindex",function funcionario($scope, $http,$state,$location){
	$scope.onChangeBuscar=function(){
		if($location.path()=="/funcionario/lista"){
			$state.go('state11',{ 'search2': $scope.search });
		}
	}
});
appfuncionario.controller("Cfuncionario",   function funcionario($scope, $http,$state,$location){
	
	//appfuncionario.value('UrlBase', baseU);

	appfuncionario.UrlBase=$scope.urlBase;
	$scope.onChangeUnidad=function(){
		//$http.({url:Getitem})
		$scope.item="cargando...";
		$http.get("../unidades/getitem/?id="+$scope.unidad)
    		.then(function(response) {
    			
    			console.log(response);

    			$scope.item=response.data.item+1;
    		});
    		
	}
	$scope.onChangeCI=function(){
		$http({
				url:"../persona/existe?ci="+$scope.ci_,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
    		.success(function(response,st,he,con) {
    			try{
    				if(response.cant>0){
    					$scope.nombres=response.persona.nombres;
    					$scope.paterno=response.persona.ap_paterno;
    					$scope.materno=response.persona.ap_materno;
    					$scope.naci=response.persona.fech_naci;
    					$scope.genero=response.persona.genero;
    					$scope.foto='../images/face/'+response.persona.dir_foto;
    					console.log(response.funcionario);
    					if(response.funcionario.estado==1)
    						{$scope.activo=true;

    						}
    					else{
    						alert("bien");
    						$scope.activo=false;
    					}
    				}
    				else{
    					$scope.nombres="";
    					$scope.paterno="";
    					$scope.materno="";
    					$scope.naci="";
    					$scope.genero="";
    					$scope.foto='';
    				}
    			}catch(e){
    				/*$scope.salida="";
    				console.log(e+"---");
    				$scope.salida=response;
    				console.log(response);*/
    			}
    			
    		}).error(function(response,st,he,con){

    	});
	}

	/*$scope.open=function(){
		$http({url:"../profesiones/create/",
			
			headers: {"X-Requested-With" : "XMLHttpRequest"}})
    		.then(function(response) {
    			console.log(response.data);
    			$scope.salida=response.data;
    		});
	}*/
	
	$scope.save=function(){
		var datos=$("#formprofesion").serialize();
		//$scope.salida="22";
		/*$http({
				url:"../profesiones/create",
				data:datos,
				method: 'POST',
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
    		.success(function(response,st,he,con) {
    			try{
    				console.log(response.estado);
    				if(typeof response.estado=="undefined")
    					throw "Error datos";
    				if(response.estado==1){
    					$('#myModal').modal('hide');
						$('#tblfuncionario-id_profesion').append($('<option>', {
						    value: response.datos.id,
						    text: response.datos.profesion
						}));
						$('#tblfuncionario-id_profesion').val(response.datos.id);
    				}
    			}catch(e){
    				$scope.salida="";
    				console.log(e+"---");
    				$scope.salida=response;
    				console.log(response);
    			}
    			
    		}).error(function(response,st,he,con){

    	});*/


		$.ajax({
			type:"post",
			url:'../profesiones/create',
			data:datos,
			success:function(dat){
				try{
					var valor=JSON.parse(dat);
					if(valor.estado==1){
						$('#myModal').modal('hide');
						$('#tblfuncionario-id_profesion').append($('<option>', {
						    value: valor.datos.id,
						    text: valor.datos.profesion
						}));
						$('#tblfuncionario-id_profesion').val(valor.datos.id);
					}
				}catch( e){
					$("#modal_content_profesion").html(dat);
				}
				
					//
			}
		});
		
		return false;
		}
});
appfuncionario.config(function($stateProvider, $httpProvider, $urlRouterProvider) {
  $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
  $stateProvider
    .state('state1', {
      url: "/profesiones/create",
      templateUrl: "../profesiones/create",
    })
    .state('state10', {
      url: "/funcionario/admin",
      templateUrl: "funcionario/admin",
    })
    .state('state11', {
      url: "/funcionario/lista?a=:search2",
      templateUrl: 
      	 function(params) {
		    return 'funcionario/lista/?FuncionarioSearch[nombre]=' + params.search2;
		},
    })
});