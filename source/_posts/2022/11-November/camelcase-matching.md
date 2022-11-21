---
extends: _layouts.post
section: content
title: Camelcase matching
problemUrl: https://leetcode.com/problems/camelcase-matching/
date: 2022-11-21
categories: [two-pointers, queue]
---

We will create a helper function to check if a string is a subsequence of another string. Then we will iterate over the queries and check if the query is a subsequence of the pattern. If it is, then we will append it to the result.

```python
class Solution:
    def camelMatch(self, queries: List[str], pattern: str) -> List[bool]:
        def match(item):
            queue = collections.deque([c for c in pattern])
            for c in item:
                if queue and c == queue[0]:
                    queue.popleft()
                elif c.isupper():
                    return False
            return not queue
        
        return [True if match(item) else False for item in queries]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`