@extends('layouts.app')

@section('chart')

<div id="stats">
    <div class="container">
        <select v-model="year" @change="filterByYear">
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
        </select>
        <canvas id="myChart"></canvas>    
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="{{ asset('js/stats.js') }}"></script>
@endsection