<x-app-layout> {{-- Fő layout --}}

    <!-- Hero szekció -->
    <section class="section-hero title">
        <div class="container w-container" style="text-align:center;">
            <h1 class="bottom-margin-extra-small" style="color:white; text-shadow:2px 2px 5px rgba(0,0,0,0.4);">
                Beérkezett üzenetek
            </h1>
            <h3 class="hero-sub-title" style="color:white;">
                Az összes kapcsolatfelvételi üzenet egy helyen.
            </h3>
        </div>
    </section>

    <!-- Üzenetek táblázat -->
    <section style="background-color:#f8f8f8; padding:60px 0;">
        <div class="container w-container">
            <div class="block-main-holder" style="background:white; padding:30px; border-radius:12px; box-shadow:0 0 15px rgba(0,0,0,0.1);">
                @if($messages->isEmpty())
                    <p style="text-align:center; color:#666;">Még nincs üzenet.</p>
                @else
                    <table style="width:100%; border-collapse:collapse;">
                        <thead>
                            <tr style="background-color:#d32f2f; color:white;">
                                <th style="padding:12px; text-align:left; border-radius:8px 0 0 0;">Név</th>
                                <th style="padding:12px; text-align:left;">Email</th>
                                <th style="padding:12px; text-align:left;">Üzenet</th>
                                <th style="padding:12px; text-align:left; border-radius:0 8px 0 0;">Dátum</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                                <tr style="border-bottom:1px solid #eee;">
                                    <td style="padding:10px;">{{ $message->name }}</td>
                                    <td style="padding:10px; color:#0073e6;">{{ $message->email }}</td>
                                    <td style="padding:10px;">{{ $message->message }}</td>
                                    <td style="padding:10px; color:#777;">{{ $message->created_at->format('Y.m.d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>

</x-app-layout>
