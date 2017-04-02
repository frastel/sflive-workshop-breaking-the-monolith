vcl 4.0;

backend default {
  .host = "monolith";
  .port = "80";
}

backend newsletter {
  .host = "newsletter";
  .port = "80";
}

backend user {
  .host = "user";
  .port = "80";
}

sub vcl_recv {
    # not "/^newsletter"
    if (req.url ~ "/newsletter") {
        set req.backend_hint = newsletter;
    } elseif (req.url ~ "/users") {
        set req.backend_hint = user;
    } else {
        set req.backend_hint = default;
    }
}

sub vcl_backend_response {
    // Check for ESI acknowledgement and remove Surrogate-Control header
    //if (beresp.http.Surrogate-Control ~ "ESI/1.0") {
        unset beresp.http.Surrogate-Control;
        set beresp.do_esi = true;
    //}
}
