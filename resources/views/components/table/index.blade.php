@props([
    'headers',
    'body'
])

<div class="overflow-hidden w-full overflow-x-auto rounded-xl border border-slate-300 dark:border-slate-700">
    <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
        <thead class="border-b border-slate-300 bg-slate-50 text-sm text-slate-900 dark:border-slate-700 dark:bg-slate-900 dark:text-white">
        <tr>
            @foreach($headers as $header)
                <th scope="col" class="p-4">{{ $header }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
            {{ $body }}
        </tbody>
    </table>
</div>
