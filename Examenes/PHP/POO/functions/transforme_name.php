function transform_name($name) {
    $words = explode(' ', $name);
    $first_name = $words[0];
    $last_name = implode(' ', array_slice($words, 1));
    return {"first_name": $first_name, "last_name": $last_name};
}