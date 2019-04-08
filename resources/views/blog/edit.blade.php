@include('header')
    @include('nav')
        <div>
            <br><br>
            <br>

            <center>

                <h3>Editing article</h3>
                @if($error == NULL)
                <form method="post">
                <table class="table">                    
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <th> Title</th>
                        <td><textarea rows="4" cols="100" required name='title' >{{$article->title}}</textarea></td>
                    </tr>                   
                    <tr>
                        <th> Post</th>                        
                        <td><textarea rows="10" cols="100" required name='body' >{{$article->body}}</textarea></td>
                    </tr>
                    <input type="hidden" name="id" value="{{$article->id}}">
                    @endforeach
                </tbody>

                </table>
                <input type="submit" name="edit" value="edit">
                    {{ csrf_field() }}
                </form>
                @else
                    <div class="alert alert-danger">{{$error}}</div>
                @endif
            </center>
        </div>
    </body>
</html>