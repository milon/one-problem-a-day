---
extends: _layouts.post
section: content
title: Word break
problemUrl: https://leetcode.com/problems/word-break/
date: 2022-08-10
categories: [dynamic-programming]
---

We can solve the problem using BFS. We can model the problem as graph, every index can be considered as vertex and every edge is a completed word. Then the problem just boiled down if the path exists.

```python
class Solution:
    def wordBreak(self, s: str, wordDict: List[str]) -> bool:
        q = collections.deque()
        visited = set()
        wordDict = set(wordDict)    # for O(1) lookup
        q.appendleft(0)
        visited.add(0)
        while q:
            cur_index = q.pop()
            for i in range(cur_index, len(s)+1):
                if i in visited:
                    continue
                if s[cur_index:i] in wordDict:
                    if i == len(s):
                        return True
                    q.appendleft(i)
                    visited.add(i)
        return False
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`