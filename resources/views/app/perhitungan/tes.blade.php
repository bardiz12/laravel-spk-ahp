<div class="table-responsive">
        <table id="result" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Alternative</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                        
                    @foreach ( $result as $i=>$d)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$d['name']}}</td>
                            <td>{{$d['value']}}</td>
                        </tr>
                    @endforeach
                    
                    
                </tbody>
                
            </table>
    </div>
    <div class="jumbotron mt-5 collapse" id="coretan-body">
        <h3>Coretan</h3>
        <pre>
            {{$debug}}
        </pre>
    </div>



<script>
$(document).ready(function() {
    $('#result').DataTable({
        "order": [[ 2, "desc" ]]
    });
} );
</script>
