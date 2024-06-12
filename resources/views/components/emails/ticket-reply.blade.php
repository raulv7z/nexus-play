@props(['ticket', 'reply'])

@extends('partials.mails.template')

@section('email-body')
    <div style="padding: 20px; font-family: Arial, sans-serif; color: #333;">
        <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">
            {{ __('Ticket') }}
        </h1>
        <div style="margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px;">
            <p style="margin: 5px 0; font-size: 14px;"><strong>{{ __('Ticket Code (#):') }}</strong> {{ $ticket->code_ticket }}</p>
            <p style="margin: 5px 0; font-size: 14px;"><strong>{{ __('Date:') }}</strong> {{ $ticket->issued_at }}</p>
        </div>
        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">
                {{ __('Contact Details') }}:
            </h2>
            <div style="padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                <p style="margin: 5px 0; font-size: 14px;"><strong>{{ __('Name') }}:</strong> {{ $ticket->name }}</p>
                <p style="margin: 5px 0; font-size: 14px;"><strong>{{ __('Email') }}:</strong> {{ $ticket->email }}</p>
            </div>
        </div>
        <div style="margin-bottom: 20px;">
            <h2 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">
                {{ __('Nexus support reply') }}:
            </h2>
            <p style="margin: 5px 0; font-size: 12px;"> {{ $reply }} </p>
        </div>
    </div>
    <div style="text-align: center; margin-top: 20px;">
        <a href="http://localhost:8000" style="display: inline-block; padding: 10px 20px; font-size: 16px; color: #ffffff; background-color: #007bff; border-radius: 5px; text-decoration: none;">
            {{ __('Go Nexus') }}
        </a>
    </div>
@endsection
