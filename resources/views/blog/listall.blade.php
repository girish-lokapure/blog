@include('header')
    @include('nav')
        <div>
            <br><br>
            <br>

            <center>
                <h3>List of all blog posts</h3>
                <table class="table table-bordered">
                    <thead>   
                        <tr>
                            <th>Id</th>
                            <th>title</th>
                            <th>status</th>
                            <th>created</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
  
                    @foreach($articles as $article)
                    <tr>
                        <td><a href="{!!url('blog/list')!!}/{{$article->id}}">{{$article->id}}</a></td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->status}}</td>
                        <td>{{$article->created_at}}</td>
                        <td>
                            <a href="{!!url('blog/edit')!!}/{{$article->id}}">Edit</a> |
                            <a href="{!!url('blog/delete')!!}/{{$article->id}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                </table>

            </center>
        </div>
    </body>
</html>
