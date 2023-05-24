---
extends: _layouts.post
section: content
title: Count vowel strings in ranges
problemUrl: https://leetcode.com/problems/count-vowel-strings-in-ranges/
date: 2023-05-24
categories: [array-and-hashmap]
---

We construct alambdaboolean functionvowelsto assess whether the word qualifies. Then we map the words using this function. Then we construct the prefix sum of the mapped words. Finally, we return the difference between the prefix sum of the end and the prefix sum of the start.

```python
class Solution:
    def vowelStrings(self, words: List[str], queries: List[List[int]]) -> List[int]:
        vowels = lambda w: w[0] in 'aeiou' and w[-1] in 'aeiou'
        words = map(vowels, words)
        prefix_sum = list(itertool.accumulate(words, initial = 0))
        return [prefix_sum[r+1] - prefix_sum[l] for l, r in queries] 
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`