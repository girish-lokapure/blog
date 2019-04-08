@include('header')
    @include('nav')
        <div>
            <br><br>
            <br>

            <center>

                <h3>Add an article</h3>
                
                <form method="post">
                <table class="table">                    
                    <tbody>
                
                    <tr>
                        <th> Title</th>
                        <td><textarea rows="4" cols="100" required name='title' ></textarea></td>
                    </tr>                   
                    <tr>
                        <th> Post</th>                        
                        <td><textarea rows="10" cols="100" required name='body' ></textarea></td>
                    </tr>
                    
                    
                </tbody>

                </table>
                <input type="submit" name="add" value="Submit">
                    {{ csrf_field() }}
                </form>                
            </center>
        </div>
    </body>
</html>