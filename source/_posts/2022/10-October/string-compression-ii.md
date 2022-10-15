---
extends: _layouts.post
section: content
title: String compression II
problemUrl: https://leetcode.com/problems/string-compression-ii/
date: 2022-10-15
categories: [dynamic-programming]
---

Start from the beginning of the s, you would meet two situations:

- The next character is the same as the last one, e.g. "aaa" with the next one still "a". The former characters would be "a3", so you need to combine them and make it "a4"
- The total length of this part would be changed if you get count from 1->2 ("a" -> "a2"), 9->10 ("a9" -> "a10") or 99 -> 100 ("a99"->"a100"). The next character is not the same, e.g. "aaa" with the next one "b"

You can either choose to :
accept "b" -> your length would increase 1 and the count resets to 1 deny "b" -> your length would remain the same, the last character still "a", while the chances would decrease 1. Since we want the minimum length for the answer, so use min while taking situation 2. (While meeting left < 0, chances are run out so return the maximum value math.inf)

```python
class Solution:
    def getLengthOfOptimalCompression(self, s: str, k: int) -> int:
        @cache
        def counter(start, last, last_count, left):
            if left < 0:
                return math.inf
            if len(s)-start <= left:
                return 0
            if s[start] == last:
                incr = 1 if last_count == 1 or last_count == 9 or last_count == 99 else 0
                return incr + counter(start+1, last, last_count+1, left)
            else:
                keep_counter = 1 + counter(start+1, s[start], 1, left)
                skip_counter =  counter(start + 1, last, last_count, left - 1)
                return min(keep_counter, skip_counter)
        
        return counter(0, "", 0, k)
```

Time Complexity: `O(n*k)` <br/>
Space Complexity: `O(n*k)`