<thead class="thead-light">
    <tr>
        <th>#</th>
        <th>DESIGNATION</th>
        <th class="text-center">QTY</th>
        <th class="text-right">P.U (CDF)</th>
        <th class="text-right">P.T (CDF)</th>
        <th class="text-center">Actions</th>
    </tr>
</thead>
<tbody>
    <tr>
        <th></th>
        <td>1.{{$factureData->consultation->name}}</td>
        <td class="text-center">1</td>
        <td class="text-right">{{number_format($factureData->consultation->price_prive, 1, ',', ' ') }}</td>
        <td class="text-right">{{number_format($factureData->consultation->price_prive, 1, ',', ' ')}}</td>
        <td class="text-center">
        </td>
    </tr>
    <tr class="">
        <td></td>
        <td ></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="border border-dark
                text-right p-2 text-danger
                 text-bold">
                 Toatl: {{number_format($factureData->consultation->price_prive, 1, ',', ' ')}}
        </td>
    </tr>
</tbody>

