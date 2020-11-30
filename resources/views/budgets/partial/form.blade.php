       <div class="form-row">

           <div class="form-group col-md-6">
               <label>Cliente</label>
               @if(isset($budgets))
               <input type="text" name="client" class="form-control @error('client') is-invalid @enderror" id="inputEmail4" placeholder="Nome completo" value="{{ $budgets->client }}">
               @else
               <input type="text" name="client" class="form-control @error('client') is-invalid @enderror" id="inputEmail4" placeholder="Nome completo">
               @endif

               @error('client')
               <div class="alert alert-danger">{{ $message }}</div>
               @enderror
           </div>

           <div class=" form-group col-md-6">
               <label>Vendedor</label>
               @if(isset($budgets))
               <input type="text" name="seller" class="form-control  @error('seller') is-invalid @enderror" id="inputAddress" placeholder="Nome completo" value="{{ $budgets->seller }}">
               @else
               <input type="text" name="seller" class="form-control  @error('seller') is-invalid @enderror" id="inputAddress" placeholder="Nome completo">
               @endif

               @error('seller')
               <div class="alert alert-danger">{{ $message }}</div>
               @enderror
           </div>
       </div>
       <div class="form-row">
           <div class="form-group col-md-4">
               <label>Data do orçamento</label>
               @if(isset($budgets))
               <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="inputPassword4" value="{{$budgets->date}}">
               @else
               <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="inputPassword4">
               @endif

               @error('date')
               <div class="alert alert-danger">{{ $message }}</div>
               @enderror
           </div>
           <div class="form-group col-md-4">
               <label>horario do orçamento</label>
               @if(isset($budgets))
               <input type="time" name="schedule" class="form-control @error('schedule') is-invalid @enderror" id="inputPassword4" value="{{$budgets->schedule}}">
               @else
               <input type="time" name="schedule" class="form-control @error('schedule') is-invalid @enderror" id="inputPassword4">
               @endif

               @error('schedule')
               <div class="alert alert-danger">{{ $message }}</div>
               @enderror
           </div>

           <div class="form-group col-md-4">
               <label>Valor</label>
               @if(isset($budgets))
               <input type="text" name="cost" class="form-control @error('cost') is-invalid @enderror" id="inputZip" placeholder="00,00" value="{{$budgets->cost}}">
               @else
               <input type="text" name="cost" class="form-control @error('cost') is-invalid @enderror" id="inputZip" placeholder="00,00">
               @endif

               @error('cost')
               <div class="alert alert-danger">{{ $message }}</div>
               @enderror
           </div>
       </div>

       <div class="form-group">
           <div class="form-group">
               <label>Descrição</label>
               @if(isset($budgets))
               <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="exampleFormControlTextarea1" rows="3">{{$budgets->description}}</textarea>
               @else
               <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
               @endif

               @error('description')
               <div class="alert alert-danger">{{ $message }}</div>
               @enderror
           </div>
       </div>