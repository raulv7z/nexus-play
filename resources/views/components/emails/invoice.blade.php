@props(['invoice', 'user'])

@extends('partials.mails.template')

@section('email-body')
    <div style="padding: 20px; font-family: Arial, sans-serif; color: #333;">
        <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">
            {{ __('Invoice') }}
        </h1>
        <div style="margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px;">
            <p style="margin: 5px 0; font-size: 14px;"><strong>{{ __('Invoice Code (#):') }}</strong> {{ $invoice->invoice_number }}</p>
            <p style="margin: 5px 0; font-size: 14px;"><strong>{{ __('Date:') }}</strong> {{ $invoice->issued_at }}</p>
        </div>
        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">
                {{ __('Bill To:') }}
            </h2>
            <div style="padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                <p style="margin: 5px 0; font-size: 14px;"><strong>{{ __('Name') }}:</strong> {{ $user->name }}</p>
                <p style="margin: 5px 0; font-size: 14px;"><strong>{{ __('Email') }}:</strong> {{ $user->email }}</p>
            </div>
        </div>
        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">
                {{ __('Purchase Details') }}
            </h2>
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">
                            {{ __('Game') }}
                        </th>
                        <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">
                            {{ __('Platform') }}
                        </th>
                        <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">
                            {{ __('Quantity') }}
                        </th>
                        <th style="border-bottom: 1px solid #ddd; padding: 8px; text-align: left;">
                            {{ __('Base Amount') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->entries as $entry)
                        <tr>
                            <td style="border-bottom: 1px solid #ddd; padding: 8px;">{{ $entry->videogame_name }}</td>
                            <td style="border-bottom: 1px solid #ddd; padding: 8px;">{{ $entry->platform_name }}</td>
                            <td style="border-bottom: 1px solid #ddd; padding: 8px;">{{ $entry->quantity }}</td>
                            <td style="border-bottom: 1px solid #ddd; padding: 8px;">
                                ${{ number_format($entry->unit_amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="padding: 8px; text-align: right; font-weight: bold;">
                            {{ __('Base Amount') }}
                        </td>
                        <td style="padding: 8px;">{{ number_format($invoice->base_amount, 2) }} €</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="padding: 8px; text-align: right; font-weight: bold;">
                            {{ __('Total') }}
                        </td>
                        <td style="padding: 8px;">{{ number_format($invoice->full_amount, 2) }} €</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div style="margin-top: 20px;">
            <p style="margin: 5px 0;">
                {{ __('Thanks for purchasing!') }}
            </p>
            <p style="margin: 5px 0;">
                {{ __('You have 30 business days to make returns.') }}
            </p>
        </div>
    </div>
    <div style="text-align: center; margin-top: 20px;">
        <a href="http://localhost:8000" style="display: inline-block; padding: 10px 20px; font-size: 16px; color: #ffffff; background-color: #007bff; border-radius: 5px; text-decoration: none;">
            {{ __('Visit our site') }}
        </a>
    </div>
@endsection
