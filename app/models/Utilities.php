<?php
function sanitizeInput($input) {
    // Implement your input sanitization logic here (e.g., strip_tags, trim, etc.)
    $sanitizedInput = trim(htmlspecialchars($input));
    return $sanitizedInput;
}

function sanitizeSubtasks($subtasks) {
    // Implement your subtask sanitization logic here (e.g., loop and sanitize each subtask)
    $sanitizedSubtasks = [];
    foreach ($subtasks as $subtask) {
        $sanitizedSubtasks[] = sanitizeInput($subtask);
    }
    return $sanitizedSubtasks;
}