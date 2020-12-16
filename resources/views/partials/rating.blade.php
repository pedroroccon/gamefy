<script>
    
    @if ($event) window.livewire.on('{{ $event }}', params => { @endif

    @if ($event)
        var progressBarContainer = document.getElementById(params.slug);
    @else
        var progressBarContainer = document.getElementById('{{ $slug }}');
    @endif

    var progressBarObject = new ProgressBar.Circle(progressBarContainer, {
        color: 'white',
        strokeWidth: 10,
        trailWidth: 10,
        trailColor: '#4a5568', 
        easing: 'easeInOutCirc',
        duration: {{ $duration ?? 1500 }},
        text: {
            autoStyleContainer: false
        },
        from: { color: '#48bb78', width: 10 },
        to: { color: '#48bb78', width: 10 },
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('0%');
            } else {
                circle.setText(value + '%');
            }

        }
    });

    @if ($event)
        progressBarObject.animate(params.rating);
    @else
        progressBarObject.animate('{{ $rating }}' / 100);
    @endif

    @if ($event) }) @endif
</script>