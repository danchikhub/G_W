@section('header')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">TMNT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('employeeShow')}}">Employee</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('postShow')}}">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('rawShow')}}">Raws</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('budgetShow')}}">Budget</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('productShow')}}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('productionShow')}}">Production</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('ingredientShow')}}">Ingredient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('saleShow')}}">Sale</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('purchasShow')}}">Purchase</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('unitShow')}}">Unit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('salaryPaymentShow')}}">Salary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('expensesShow')}}">Expenses</a>
            </li>
            </ul>
            
        </div>
    </div>
</nav>