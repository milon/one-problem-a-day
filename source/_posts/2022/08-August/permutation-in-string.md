---
extends: _layouts.post
section: content
title: Permutation in string
problemUrl: https://leetcode.com/problems/permutation-in-string/
date: 2022-08-02
categories: [sliding-window]
---

We will first count the characters in string1 and then we will slide a window of length of string1 and count the matches of the characters of string1 and sliding window. If the number of matches is equal to the length of sliding window, that means we already have a match. If not, then we add one character at the front and remove one character from the back of the sliding window and update it's count and matches.

```python
class Solution:
    def checkInclusion(self, s1: str, s2: str) -> bool:
        count, w, matched = collections.Counter(s1), len(s1), 0   

        for i in range(len(s2)):
            if s2[i] in count: 
                count[s2[i]] -= 1
                if count[s2[i]] == 0:
                    matched += 1
            if i >= w and s2[i-w] in count: 
                if count[s2[i-w]] == 0:
                    matched -= 1
                count[s2[i-w]] += 1

            if matched == len(count):
                return True

        return False
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`


