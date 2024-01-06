<table>
 <thead>
  <tr>
   <th><b>No</b></th>
   <th><b>Score</b></th>
  </tr>
 </thead>
 <tbody>
  @foreach($scores as $score)
  <tr>
   <td>{{ $loop->iteration }}</td>
   <td>{{ $score->score }}</td>
  </tr>
  @endforeach
 </tbody>
</table>