<tbody>
    <tr class="bg-secondary">
        <td></td>
        <td >RADIOLOGIE</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @foreach ($factureData->examenRadios as $index => $radio)
         <tr>
             <th ></th>
             <td>{{$index+1}}.{{$radio->name}}</td>
             <td class="text-center">{{$radio->pivot->qty}}</td>
             <td class="text-right">{{number_format($radio->price_prive, 1, ',', ' ')}}</td>
             <td class="text-right">{{number_format($radio->price_prive*$radio->pivot->qty, 1, ',', ' ') }}</td>
             <td class="text-center">
             </td>
         </tr>
         @php
             $total_radio+=$radio->price_prive*$radio->pivot->qty;
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
                 Toatl: {{number_format($total_radio, 1, ',', ' ')}}
        </td>
    </tr>
</tbody>
