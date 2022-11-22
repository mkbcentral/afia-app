
<tbody>
    <tr class="bg-secondary">
        <td></td>
        <td >ACTES</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    </tr>
    @foreach ($factureData->actes as $index => $acte)
         <tr>
             <th></th>
             <td>{{$index+1}}.{{$acte->name}}</td>
             <td class="text-center">{{$acte->pivot->qty}}</td>
             <td class="text-right">{{number_format($acte->price_prive, 1, ',', ' ')}}</td>
             <td class="text-right">{{number_format($acte->price_prive*$acte->pivot->qty, 1, ',', ' ') }}</td>
             <td class="text-center">
             </td>
         </tr>
         @php
             $total_acte+=$acte->price_prive*$acte->pivot->qty;
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
                 Toatl: {{number_format($total_acte, 1, ',', ' ')}}
        </td>
    </tr>
 </tbody>
