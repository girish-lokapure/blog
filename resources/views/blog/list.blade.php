@include('header')
    @include('nav')
        <div>
            <br><br>
            <br>

            <center>

                <h3>Listing article</h3>
                @if($error == NULL)

                <table class="table table-bordered">                    
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <th> Title</th>
                        <td>{{$article->title}}</td>
                    </tr>                   
                    <tr>
                        <th> Post</th>
                        <td>{{$article->body}}</td>
                    </tr>

                    @endforeach
                </tbody>

                </table>
                @else
                    <div class="alert alert-danger">{{$error}}</div>
                @endif
            </center>
        </div>
    </body>
</html>
