<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gerenciamento de usuários</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {        
            padding-bottom: 15px;
            background: #0397d6;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn-group {
            float: right;
        }
        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 100px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }	
        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #F44336;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li a:hover {
            color: #666;
        }	
        .pagination li.active a, .pagination li.active a.page-link {
            background: #03A9F4;
        }
        .pagination li.active a:hover {        
            background: #0397d6;
        }
        .pagination li.disabled i {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }
        .modal .modal-header, .modal .modal-body, .modal .modal-footer {
            padding: 20px 30px;
        }
        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }
        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }
        .modal .modal-title {
            display: inline-block;
        }
        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }
        .modal textarea.form-control {
            resize: vertical;
        }
        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }	
        .modal form label {
            font-weight: normal;
        }	
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();

            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.zipcode').mask('00000-000');
            $('.phone').mask('(00) 00000-0000');
        });
    </script>
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Gerenciar <b>Usuários</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addUserModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar Novo Usuário</span></a>
					</div>
				</div>
			</div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if ($users->isEmpty())
                <div class="alert alert-danger">
                    <p>Nenhum usuário cadastrado, clique no botão acima e crie o primeiro usuário!</p>
                </div>
            @else

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
                        <th>CPF</th>
						<th>Endereço</th>
						<th>Telefone</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->cpf}}</td>
                            <td>
                                {{$user->address->street}}, {{$user->address->number}}, {{$user->address->complement}}, {{$user->address->city}} - {{$user->address->state}}, {{$user->address->country}}, CEP: {{$user->address->zipcode}}
                            </td>
                            <td>
                                @if ($user->phones != null)
                                    @foreach ($user->phones as $phone)
                                        {{$phone->phone}} 
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="#editUserModal" class="edit" data-toggle="modal" data-target="#editUserModal-{{$user->id}}" id="edit-{{$user->id}}">
                                    <i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i>
                                </a>
                                <a href="#deleteUserModal" class="delete" data-toggle="modal" data-target="#deleteUserModal-{{$user->id}}" id="delete-{{$user->id}}">
                                    <i class="material-icons" data-toggle="tooltip" title="Deletar">&#xE872;</i>
                                </a>
                            </td>
                        </tr>

                        <!-- Edit Modal HTML -->
                        <div id="editUserModal-{{$user->id}}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('update_user', ['id' => $user->id]) }}">
                                        <div class="modal-header">						
                                            <h4 class="modal-title">Editar Usuário</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" value="{{$user->name}}" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" value="{{$user->email}}" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Senha</label>
                                                <input type="password" class="form-control" name="password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>CPF</label>
                                                <input type="text" class="form-control cpf" value="{{$user->cpf}}" name="cpf" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Data de nascimento</label>
                                                <input type="date" class="form-control" value="{{$user->birthday}}" name="birthday" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Perfil</label>
                                                <select class="form-control" name="profile" required>
                                                    <option value="1" selected="{{$user->profile == 1 ? true : false}}">Operário</option>
                                                    <option value="2" selected="{{$user->profile == 2 ? true : false}}">Supervisor</option>
                                                    <option value="3" selected="{{$user->profile == 3 ? true : false}}">Admin</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Telefone Principal</label>
                                                <input type="text" class="form-control phone" value="{{$user->phones[0]->phone}}" name="phone" required>
                                            </div>
                                            <p class="text-center font-weight-bold">Endereço completo</p>
                                            <div class="form-group">
                                                <label>Logradouro</label>
                                                <input type="text" class="form-control" value="{{$user->address->street}}" name="street" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Complemento</label>
                                                <input type="text" class="form-control" value="{{$user->address->complement}}" name="complement" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Número</label>
                                                <input type="text" class="form-control" value="{{$user->address->number}}" name="number" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input type="text" class="form-control" value="{{$user->address->city}}" name="city" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input type="text" class="form-control" value="{{$user->address->state}}" name="state" required>
                                            </div>
                                            <div class="form-group">
                                                <label>País</label>
                                                <input type="text" class="form-control" value="{{$user->address->country}}" name="country" required>
                                            </div>
                                            <div class="form-group">
                                                <label>CEP</label>
                                                <input type="text" class="form-control zipcode" value="{{$user->address->zipcode}}" name="zipcode" required>
                                            </div>	
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                            <input type="submit" class="btn btn-info" value="Salvar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Modal HTML -->
                        <div id="deleteUserModal-{{$user->id}}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('delete_user', ['id' => $user->id]) }}">
                                        {{ csrf_field() }}
                                        <div class="modal-header">						
                                            <h4 class="modal-title">Deletar Usuário</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">					
                                            <p>Tem certeza que deseja excluir este usuário?</p>
                                            <p class="text-warning"><small>Essa ação não pode ser desfeita.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                            <input type="submit" class="btn btn-danger" value="Sim">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $users->links("pagination::bootstrap-4") }}
				</tbody>
			</table>
			{{-- <div class="clearfix">
				<div class="hint-text">Mostrando <b>5</b> de <b>{{$users->count()}}</b> usuários</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Anterior</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Próximo</a></li>
				</ul>
			</div> --}}
            
            @endif
		</div>
	</div>        
</div>
<!-- Add Modal HTML -->
<div id="addUserModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ route('create_user') }}">
				<div class="modal-header">						
					<h4 class="modal-title">Adicionar Usuário</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">			
					<div class="form-group">
                        {{ csrf_field() }}
						<label>Nome</label>
						<input type="text" class="form-control" name="name" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" required>
					</div>
                    <div class="form-group">
						<label>Senha</label>
						<input type="password" class="form-control" name="password" required>
					</div>
                    <div class="form-group">
						<label>CPF</label>
						<input type="text" class="form-control cpf" name="cpf" id="cpf" required>
					</div>
                    <div class="form-group">
						<label>Data de nascimento</label>
						<input type="date" class="form-control" name="birthday" required>
					</div>
                    <div class="form-group">
                        <label>Perfil</label>
                        <select class="form-control" name="profile" required>
                            <option value="1">Operário</option>
                            <option value="2">Supervisor</option>
                            <option value="3">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
						<label>Telefone Principal</label>
						<input type="text" class="form-control phone" name="phone" required>
					</div>
                    <p class="text-center font-weight-bold">Endereço completo</p>
                    <div class="form-group">
						<label>Logradouro</label>
						<input type="text" class="form-control" name="street" required>
					</div>
					<div class="form-group">
						<label>Complemento</label>
						<input type="text" class="form-control" name="complement" required>
					</div>
                    <div class="form-group">
						<label>Número</label>
						<input type="text" class="form-control" name="number" required>
					</div>
                    <div class="form-group">
						<label>Cidade</label>
						<input type="text" class="form-control" name="city" required>
					</div>
                    <div class="form-group">
						<label>Estado</label>
						<input type="text" class="form-control" name="state" required>
					</div>
                    <div class="form-group">
						<label>País</label>
						<input type="text" class="form-control" name="country" required>
					</div>
                    <div class="form-group">
						<label>CEP</label>
						<input type="text" class="form-control zipcode" name="zipcode" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" value="Adicionar">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>