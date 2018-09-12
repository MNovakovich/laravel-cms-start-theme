@extends('layouts.admin')

@section('content')
<h2>General Settings </h2>

<div class="row">
   <div class="col-sm-12">
        <form action="/admin/options-general" method="post">
            <table id="form-table">
                <tbody>
                    <tr class="option-input-row ">
                        <th class="input-options option-title">Site title</th>
                        <td class="input-options option-input">
                            <input type="text" placeholder="Enter Site" name="blogname" value="{{ bloginfo('blogname')}}">
                        </td>
                    </tr>
                    <tr class="option-input-row ">
                        <th class="input-options option-title">Tagline</th>
                        <td class="input-options option-input">
                            <input type="text" placeholder="Enter Tagline" name="blogdescription" value="{{ bloginfo('blogdescription')}}">
                            <p class="description" id="tagline-description">In a few words, explain what this site is about.</p>
                        </td>
                    </tr>
                    <tr class="option-input-row ">
                        <th class="input-options option-title">Tag Line</th>
                        <td class="input-options option-input">
                            <input type="text" placeholder="Enter Site" name="tagline">
                        </td>
                    </tr>
                </tbody>
            </table>
             {{ csrf_field() }}
            <button class="btn btn-primary" type="submit">Save Change</button>
        </form>
   
   </div>
</div>

@endsection('content');