---
extends: _layouts.post
section: content
title: Unique email addresses
problemUrl: https://leetcode.com/problems/unique-email-addresses/
date: 2022-10-21
categories: [array-and-hashmap]
---

We will iterate over the emails and split them into the local name and the domain name. We will then remove all the dots from the local name and remove everything after the first plus sign. We will then add the local name and the domain name to a set. Finally, we will return the size of the set.

```python
class Solution:
    def numUniqueEmails(self, emails: List[str]) -> int:
        unique = set()
        for email in emails:
            local, domain = email.split('@')
            local = local.split('+')[0].replace('.', '')
            unique.add((local, domain))
        return len(unique)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`