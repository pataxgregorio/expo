<div class="card">   
    <div class="small-box {{$color2}} card-body" style="width :240px; height:120px; margin-left: 30px;" >             
    <!--   <div class="small-box bg-blue card-body">  -->
        <div class="inner">                         
            <h3 style ="font-size:28px; padding-left: 18px;">{{$titulo2}}</h3>
            <div class="form-group form-inline" style = "font-size:18px; padding-left: 32px;">
            <p >  
                Cantidad : {{$cantidad}} 
            </p> 
            </div>
        </div>
       
    @if ($raiz==1)
        <a href="{{ route('ver', ['status' => $status]) }}">     <button type="button"  id="boton" name ="comprar" class="{{$color2}} btn comprar" style="border: none; font-weight: bold; border-radius: 81px; width:75px;margin-top:-24px;margin-left: 75px; background: #e1dede;
  color: black;">LISTAR</button>   </a>    
    @endif  
      
    </div>
</div>
