<!--
LATER REFER THIS CODE FOR BACK END LOGIC!
Refer coding studentdb.
-->

@extends('layouts.admin-layout')

@section('content') 

<div class="container mt-4">

    <!-- Success alert (static for design) -->
    <div class="alert alert-success">Booking loaded successfully!</div>

    <table class="table table-bordered table-striped table-secondary">
        <thead class="table-dark">
            <tr>
                <th>Booking ID</th>
                <th>User ID</th>
                <th>Movie ID</th>
                <th>Seat Number</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th width="180">Action</th>
            </tr>
        </thead>

        <tbody>
            <!-- Dummy booking 1 -->
            <tr>
                <td>1</td>
                <td>U001</td>
                <td>M101</td>
                <td>A12</td>
                <td>2026-01-05</td>
                <td>20:30</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="alert('Delete booking?')">
                        Delete
                    </button>
                </td>
            </tr>

            <!-- Dummy booking 2 -->
            <tr>
                <td>2</td>
                <td>U002</td>
                <td>M102</td>
                <td>B08</td>
                <td>2026-01-07</td>
                <td>18:00</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="alert('Delete booking?')">
                        Delete
                    </button>
                </td>
            </tr>

            <!-- Dummy booking 3 -->
            <tr>
                <td>3</td>
                <td>U003</td>
                <td>M103</td>
                <td>C15</td>
                <td>2026-01-10</td>
                <td>21:45</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="alert('Delete booking?')">
                        Delete
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
