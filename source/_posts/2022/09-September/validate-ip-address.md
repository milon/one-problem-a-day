---
extends: _layouts.post
section: content
title: Validate ip address
problemUrl: https://leetcode.com/problems/validate-ip-address/
date: 2022-09-15
categories: [array-and-hashmap]
---

We will split the string with `.` and `:`. If the number of chunk is not 4 for ipv4 or not 8 for ipv6, we return Neither. Otherwise, we check check separately, for ipv4, each chunk must be within 0 and 255. For ipv6 each chunk must have characters between a and f and numbers. If it validates then we return the ip type else we return Neither.

```python
class Solution:
    def validIPAddress(self, queryIP: str) -> str:
        ipv4 = queryIP.split(".")
        ipv6 = queryIP.split(":")
        
        if len(ipv4) == 4:
            for i in ipv4:
                if len(i) == 0:
                    return "Neither"
                if i.startswith("0") and len(i) > 1:
                    return "Neither"
                for el in i:
                    if not el.isdigit():
                        return "Neither"
                if int(i) < 0 or int(i) > 255:
                    return "Neither"
            return "IPv4"
        
        if len(ipv6) == 8:
            for i in ipv6:
                if len(i) == 0:
                    return "Neither"
                elif len(i) > 4:
                    return "Neither"
                for el in i:
                    if not (48 <= ord(el) <= 57 or 97 <= ord(el) <= 102 or 65 <= ord(el) <= 70):
                        return "Neither"
            return "IPv6"
        
        return "Neither"
```

Time Complexity: `O(1)` <br/>
Space Complexity: `O(1)`