<tr class="comment-level-{{ $level }}">
  <td>{{ $globalIndex + 1 }}</td>
  <td>{{ $comment->created_at->format('d-m-Y H:i') }}</td>
  <td>
    <a href="{{ route('post.show', $comment->post->slug) }}" target="_blank">
      {{ $comment->post->title }}
    </a>
  </td>
  <td>
    @if($level > 0)
      <small class="text-muted">↳ Reply</small><br>
    @endif
    {!! $comment->name ?? '' !!} <br>
    {!! $comment->email ?? '' !!} <br>
    {!! $comment->contact ?? '' !!}
  </td>
  <td style="padding-left: {{ $level * 20 }}px;">
    @if($level > 0)
      <span class="badge badge-info mr-2">Reply</span>
    @else
      <span class="badge badge-primary mr-2">Comment</span>
    @endif
    {!! Str::limit($comment->content, $level > 0 ? 80 : 100) !!}
  </td>
  <td>
    <span class="badge {{ $comment->status === 'active' ? 'badge-success' : 'badge-warning' }}">
      {{ $comment->status ?? 'Pending' }}
    </span>
  </td>
  <td>
    <ul class="action">
      <li>
        <a href="javascript:void(0)" class="view-comment" comment_id="{{ $comment->id }}" title="View Full Comment">
          <i class="fas fa-eye"></i>
        </a>
      </li>
      <li>
        <a href="javascript:void(0)" comment_id="{{ $comment->id }}" class="delete-comment" title="Delete Comment">
          <i class="fas fa-trash"></i>
        </a>
      </li>
    </ul>
  </td>
</tr>

{{-- Recursively render replies --}}
@if($comment->replies && $comment->replies->count() > 0)
  @foreach($comment->replies as $reply)
    @include('admin.comments-row', [
      'comment' => $reply, 
      'level' => $level + 1, 
      'globalIndex' => $globalIndex
    ])
  @endforeach
@endif
