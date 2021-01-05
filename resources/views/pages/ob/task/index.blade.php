@extends('layouts.ob')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $title }}</h4>
            <div class="box box-warning">
                <div class="box-header">
                    <p>
                        <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>Refresh
                        </button>
                    </p>
                </div>
                <div class="box-body">

                    <div class="table-responsive">
                        <table class="table table-hover myTable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tugas</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="tbody"></tbody>
                        </table>
                    </div>
                    <div id="confirmed"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        let task_id = []
        const url ='{{ env('APP_URL') }}'
        const state = '{{ $state }}'
        const tbody = document.querySelector('#tbody')
        const send = document.querySelector('#confirmed')
        let tr = ``;
        document.addEventListener('DOMContentLoaded', async function(){
            const data = await getData()
            const clear_task_today = data.clear_task_today
            const all_task = data.all_task
            if (clear_task_today < all_task){
                send.innerHTML = `
                <form action="{{ route('task.clear') }}" method="post">
                            @csrf
                            <input id="input_checkbox" type="hidden" name="input_checkbox">
                            <input type="hidden" name="state" value="{{ $state }}">
                            <button class="btn btn-success btn-md">Verifikasi</button>
                        </form>`
            }
            data.data.map((d, i) => tr += show(d, i));
            tbody.innerHTML = tr

        }, false);

        function getData(){
            return fetch(`${url}/office-boy/task/${state}/data`)
            .then(res => res.json())
            .then(data => data);
        }

        function show(d, i){
            const tr = `<tr>
            <td>${i+1}</td>
            <td>${d.name}</td>
            <td><span class="label label-${d.label}">${d.status}</span></td>
            <td>
            ${d.status == 'belum selesai' ? `<div class="checkbox d-flex justify-content-center">
            <input type="checkbox" onchange="setTaskId(${d.id})"
            value="${d.id}" id="data-check" name="checkbox"></div>
            ` : ''}
            </td>

            </tr>`
            return tr
        }

         function setTaskId(id){
            task_id.push(id)
            const input_checkbox = document.querySelector('#input_checkbox')
            console.log(input_checkbox);
            input_checkbox.value = task_id.join(',');
        }

    </script>
@endsection
