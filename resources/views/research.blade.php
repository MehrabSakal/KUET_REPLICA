@extends('layouts.app')

@section('title', 'Research - KUET')
@section('page_title', 'Research at KUET')

@section('content')
<div class="research-dashboard">
    
    <!-- Static Vision Section -->
    <div class="vision-section">
        <div class="vision-content">
            <h2 class="vision-title">The Vision of KUET Research</h2>
            <p class="vision-description">
                Khulna University of Engineering & Technology (KUET) is dedicated to advancing the frontiers of science, engineering, and technology through innovative, interdisciplinary research. Our mission is to foster a dynamic academic environment that encourages creativity, critical thinking, and the pursuit of knowledge to address both national challenges and global needs.
            </p>
            <div class="vision-values">
                <div class="value-card">
                    <h3 class="value-title">Innovation</h3>
                    <p class="value-description">Driving technological advancements and creative solutions for modern engineering problems.</p>
                </div>
                <div class="value-card">
                    <h3 class="value-title">Global Impact</h3>
                    <p class="value-description">Publishing world-class research that contributes to the global scientific community.</p>
                </div>
                <div class="value-card">
                    <h3 class="value-title">Collaboration</h3>
                    <p class="value-description">Partnering with industries and institutions worldwide for interdisciplinary excellence.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic OpenAlex Dashboard -->
    <div class="dashboard-header">
        <h2 class="dashboard-title">Research Dashboard</h2>
        <p class="dashboard-subtitle">Live data powered by OpenAlex</p>
    </div>

    <!-- Stats Row -->
    <div class="statistics-row">
        <div class="stat-card">
            <div class="stat-info">
                <p class="stat-label">Total Publications</p>
                <h3 class="stat-value publication-color">{{ number_format($totalWorks) }}</h3>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-info">
                <p class="stat-label">Total Citations</p>
                <h3 class="stat-value citation-color">{{ number_format($totalCitations) }}</h3>
            </div>
        </div>
    </div>

    <!-- Recent Publications -->
    <div class="publications-section">
        <div class="publications-header">
            <h3 class="publications-title">Recent Publications</h3>
            <span class="publications-badge">Top {{ count($recentWorks) }}</span>
        </div>
        <div class="publications-list">
            @forelse($recentWorks as $work)
                <div class="publication-item">
                    <div class="publication-details">
                        <a href="{{ $work['doi'] ?? $work['id'] }}" target="_blank" rel="noopener noreferrer" class="publication-link">
                            {{ $work['title'] ?? 'Untitled Work' }}
                        </a>
                        
                        <p class="publication-authors">
                            @if(isset($work['authorships']))
                                @php
                                    $authors = array_map(function($a) { return $a['author']['display_name'] ?? ''; }, array_slice($work['authorships'], 0, 5));
                                @endphp
                                {{ implode(', ', array_filter($authors)) }}
                                @if(count($work['authorships']) > 5) <span class="authors-et-al">et al.</span> @endif
                            @endif
                        </p>
                        
                        <div class="publication-metadata">
                            <span class="metadata-item">
                                Year: {{ $work['publication_year'] ?? 'Unknown Year' }}
                            </span>
                            
                            @if(isset($work['primary_location']['source']['display_name']))
                            <span class="metadata-item">
                                Source: {{ $work['primary_location']['source']['display_name'] }}
                            </span>
                            @endif
                            
                            @if(isset($work['cited_by_count']) && $work['cited_by_count'] > 0)
                            <span class="metadata-item citation-count">
                                {{ $work['cited_by_count'] }} Citations
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <a href="{{ $work['doi'] ?? $work['id'] }}" target="_blank" rel="noopener noreferrer" class="view-paper-btn">
                        View Paper
                    </a>
                </div>
            @empty
                <div class="no-publications">
                    <p>No recent publications found for KUET.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
