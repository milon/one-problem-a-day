---
extends: _layouts.post
section: content
title: Encode and decode string
problemUrl: https://leetcode.com/problems/encode-and-decode-string/
date: 2022-07-18
categories: [array-and-hashmap]
---

We will join the array using `$$` as delimeter, and also split the string with `$$` to get it back.

```python
from typing import List

class Solution:
    def encode(self, s: List[str]) -> str:
        return '$$'.join(s)

    def decode(self, s: str) -> List[str]:
        return s.split('$$')
```

Time Complexity: O(n), where n is the length of the array <br/>
Space Complexity: O(1)