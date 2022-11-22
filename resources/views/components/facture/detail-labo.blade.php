<tbody>
    <tr class="bg-secondary">
        <td></td>
        <td >LABORATOIRE</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @foreach ($factureData->examenLabos as $index => $labo)
         <tr>
             <th ></th>
             <td>{{$index+1}}.{{$labo->name}}</td>
             <td class="text-center">{{$labo->pivot->qty}}</td>
             <td class="text-right">{{number_format($labo->price_prive, 1, ',', ' ')}}</td>
             <td class="text-right">{{number_format($labo->price_prive*$labo->pivot->qty, 1, ',', ' ') }}</td>
             <td class="text-center">
             </td>
         </tr>
         @php
             $total_labo+=$labo->price_prive*$labo->pivot->qty;
         @endphp
    @endforeach
    <tr class="">
        <td></td>
        <td ></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="border border-dark
                text-right p-2 text-danger
                 text-bold">
                 Toatl: {{number_format($total_labo, 1, ',', ' ')}}
        </td>
    </tr>
</tbody>
